-- ============================================================
-- 1. USERS
-- ============================================================
CREATE TABLE
    users (
        id SERIAL PRIMARY KEY,
        email VARCHAR(150) UNIQUE NOT NULL,
        password_hash VARCHAR(255),
        role VARCHAR(10) NOT NULL CHECK (role IN ('patient', 'doctor', 'admin')),
        status VARCHAR(10) NOT NULL DEFAULT 'pending' CHECK (status IN ('pending', 'active', 'rejected')),
        force_password_change BOOLEAN NOT NULL DEFAULT FALSE,
        created_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
    );

-- ============================================================
-- 2. PATIENT
-- ============================================================
CREATE TABLE
    patients (
        user_id INTEGER PRIMARY KEY REFERENCES users (id) ON DELETE CASCADE,
        name VARCHAR(150) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        date_of_birth DATE NOT NULL,
        gender VARCHAR(20) NOT NULL,
        address VARCHAR(255),
        blood_group VARCHAR(5),
        emergency_contact_name VARCHAR(150),
        emergency_contact_phone VARCHAR(20)
    );

-- ============================================================
-- 3. DOCTOR
-- ============================================================
CREATE TABLE
    doctors (
        user_id INTEGER PRIMARY KEY REFERENCES users (id) ON DELETE CASCADE,
        doctor_login_id VARCHAR(20) UNIQUE,
        name VARCHAR(150) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        specialization VARCHAR(150) NOT NULL,
        qualification VARCHAR(150) NOT NULL,
        license_no VARCHAR(100) NOT NULL,
        experience_years INTEGER NOT NULL CHECK (experience_years >= 0),
        image_path VARCHAR(255),
        verification_status VARCHAR(10) NOT NULL DEFAULT 'pending' CHECK (
            verification_status IN ('pending', 'verified', 'rejected')
        ),
        rejection_reason VARCHAR(255),
        verified_at TIMESTAMPTZ,
        verified_by_admin_id INTEGER REFERENCES users (id) ON DELETE SET NULL
    );

-- ============================================================
-- 4. ADMIN
-- ============================================================
CREATE TABLE
    admins (
        user_id INTEGER PRIMARY KEY REFERENCES users (id) ON DELETE CASCADE,
        name VARCHAR(150) NOT NULL
    );

-- ============================================================
-- 5. HOSPITAL
-- ============================================================
CREATE TABLE
    hospitals (
        id SERIAL PRIMARY KEY,
        name VARCHAR(200) NOT NULL,
        address VARCHAR(255) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        email VARCHAR(150) NOT NULL,
        emergency_phone VARCHAR(50),
        departments TEXT,
        description TEXT,
        is_active BOOLEAN NOT NULL DEFAULT TRUE,
        created_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
    );

-- ============================================================
-- 6. DOCTOR_HOSPITAL
-- Doctor ↔ Hospital relationship
-- Stores information about where a doctor works.
-- ============================================================
CREATE TABLE
    doctor_hospital (
        id SERIAL PRIMARY KEY,
        doctor_id INTEGER NOT NULL REFERENCES doctors (user_id) ON DELETE CASCADE,
        hospital_id INTEGER NOT NULL REFERENCES hospitals (id) ON DELETE CASCADE,
        join_date DATE NOT NULL DEFAULT CURRENT_DATE,
        leave_date DATE,
        status VARCHAR(20) NOT NULL DEFAULT 'active' CHECK (status IN ('active', 'inactive', 'left')),
        created_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
        UNIQUE (doctor_id, hospital_id)
    );

-- ============================================================
-- 7. SCHEDULE
-- Schedule belongs to a specific Doctor-Hospital relationship.
-- ============================================================
CREATE TABLE
    schedules (
        id SERIAL PRIMARY KEY,
        doctor_hospital_id INTEGER NOT NULL REFERENCES doctor_hospital (id) ON DELETE CASCADE,
        day_of_week VARCHAR(20) NOT NULL CHECK (
            day_of_week IN (
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            )
        ),
        start_time TIME NOT NULL,
        end_time TIME NOT NULL,
        slot_duration_minutes INTEGER NOT NULL DEFAULT 15 CHECK (slot_duration_minutes > 0),
        max_patients_per_slot INTEGER NOT NULL DEFAULT 1 CHECK (max_patients_per_slot > 0),
        status VARCHAR(25) NOT NULL DEFAULT 'pending_approval' CHECK (
            status IN (
                'active',
                'pending_approval',
                'rejected',
                'archived'
            )
        ),
        change_reason TEXT,
        requested_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
        approved_at TIMESTAMPTZ,
        approved_by_admin_id INTEGER REFERENCES admins (user_id) ON DELETE SET NULL,
        created_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
        CHECK (end_time > start_time)
    );

-- ============================================================
-- 8. APPOINTMENT
-- Patient books a slot from a schedule.
-- ============================================================
CREATE TABLE
    appointments (
        id SERIAL PRIMARY KEY,
        appointment_token VARCHAR(50) UNIQUE NOT NULL,
        patient_id INTEGER NOT NULL REFERENCES patients (user_id) ON DELETE CASCADE,
        schedule_id INTEGER NOT NULL REFERENCES schedules (id) ON DELETE CASCADE,
        appointment_date DATE NOT NULL,
        slot_time TIME NOT NULL,
        token_number INTEGER NOT NULL CHECK (token_number > 0),
        reason TEXT,
        status VARCHAR(30) NOT NULL DEFAULT 'pending' CHECK (
            status IN (
                'pending',
                'confirmed',
                'rejected',
                'completed',
                'cancelled'
            )
        ),
        rejection_reason TEXT,
        created_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
    );

-- ============================================================
-- INDEXES
-- ============================================================
CREATE INDEX idx_users_role ON users (role);

CREATE INDEX idx_users_status ON users (status);

CREATE INDEX idx_doctors_verification ON doctors (verification_status);

CREATE INDEX idx_doctor_hospital_doctor ON doctor_hospital (doctor_id);

CREATE INDEX idx_doctor_hospital_hospital ON doctor_hospital (hospital_id);

CREATE INDEX idx_schedules_doctor_hospital ON schedules (doctor_hospital_id);

CREATE INDEX idx_appointments_patient ON appointments (patient_id);

CREATE INDEX idx_appointments_schedule ON appointments (schedule_id);

CREATE INDEX idx_appointments_date ON appointments (appointment_date);

CREATE INDEX idx_appointments_status ON appointments (status);

-- ============================================================
-- SEED ADMIN
-- Email: admin@example.com
-- Password: Password123!
-- ============================================================
INSERT INTO
    users (
        email,
        password_hash,
        role,
        status,
        force_password_change
    )
VALUES
    (
        'admin@example.com',
        '$2y$12$p0LKkAa1v7DatkqkvXIK7e04wbF3JjqQjQmfiWyHj7C9B0zSvimKy',
        'admin',
        'active',
        FALSE
    ) RETURNING id;