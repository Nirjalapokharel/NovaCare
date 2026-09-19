<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Verification | HAMS Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin/adm-doc_verify.css">
</head>

<body>

    <div class="admin-shell">

        <!-- =====================================================
         SIDEBAR
    ====================================================== -->

        <aside class="sidebar">

            <!-- Brand -->
            <div class="brand">
                <div class="brand-icon">✚</div>

                <div>
                    <strong>HAMS</strong>
                    <small>Admin Console</small>
                </div>
            </div>


            <!-- Main Navigation -->
            <nav class="nav">
                <div class="nav-label">Hospital Network</div>

                <a href="#">
                    <span class="nav-icon">⊞</span>
                    Overview
                </a>
                <a href="#">
                    <span class="nav-icon">🏥</span>
                    Manage Hospitals
                </a>
                <a href="#" class="active">
                    <span class="nav-icon">🩺</span>
                    Verify Doctors
                    <span class="nav-badge">3</span>
                </a>
                <a href="#">
                    <span class="nav-icon">📅</span>
                    Schedule Approvals
                    <span class="nav-badge">4</span>
                </a>
                <a href="#">
                    <span class="nav-icon">📋</span>
                    Appointments
                </a>
            </nav>

            <!-- Bottom Account Area -->
            <div class="sidebar-bottom">

                <div class="nav-label">Account</div>

                <a href="#" class="logout-link">
                    <span class="nav-icon">↩</span>
                    Sign Out
                </a>
            </div>
        </aside>


        <!-- =====================================================
         MAIN
    ====================================================== -->

        <main class="main">
            <header class="topbar">
                <div>
                    <div class="breadcrumb">
                        Hospital Network / Doctors
                    </div>
                    <h1>Doctor Management</h1>
                </div>

                <div class="admin-profile">
                    <div class="admin-avatar">
                        AD
                    </div>
                    <div>
                        <strong>Administrator</strong>
                        <small>Hospital Network Admin</small>
                    </div>
                </div>
            </header>

            <div class="content">

                <!-- PAGE INTRO -->
                <div class="page-intro">
                    <div>
                        <h2>Doctors & Affiliations</h2>
                        <p>
                            Review doctor registrations, verify professional
                            credentials, and manage their hospital affiliations.
                        </p>
                    </div>

                    <div class="summary">
                        <div class="summary-box pending">
                            <span>Pending</span>
                            <strong>3</strong>
                        </div>
                        <div class="summary-box verified">
                            <span>Verified</span>
                            <strong>18</strong>
                        </div>
                    </div>

                </div>

                <!-- =================================================
                 PENDING VERIFICATION
            ================================================== -->
                <section class="section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon">
                                ⏳
                            </div>
                            <div>
                                <h3>Pending Verification</h3>
                                <p>
                                    Applications waiting for credential review
                                </p>
                            </div>
                        </div>
                        <span class="section-count">
                            3 applications
                        </span>
                    </div>

                    <div class="doctor-list">

                        <!-- DOCTOR 1 -->
                        <article class="pending-card">
                            <div class="doctor-card-main">
                                <div class="doctor-info">
                                    <div class="doctor-avatar">
                                        AS
                                    </div>
                                    <div>
                                        <h4>
                                            Dr. Aarav Sharma
                                        </h4>
                                        <p>
                                            MBBS, MD
                                        </p>
                                        <div class="doctor-email">
                                            aarav.sharma@example.com
                                        </div>
                                    </div>
                                </div>

                                <div class="credential-grid">
                                    <div class="credential">
                                        <span>Specialization</span>
                                        <strong>
                                            <span class="specialization">
                                                Cardiology
                                            </span>
                                        </strong>
                                    </div>

                                    <div class="credential">
                                        <span>License Number</span>

                                        <strong>
                                            NMC-45872
                                        </strong>
                                    </div>

                                    <div class="credential">
                                        <span>Experience</span>
                                        <strong>
                                            8 Years
                                        </strong>
                                    </div>
                                </div>

                                <div class="hospital-control">
                                    <label>
                                        Initial Hospital Assignment
                                    </label>

                                    <select>
                                        <option>
                                            Select hospital...
                                        </option>

                                        <option>
                                            City Care Hospital
                                        </option>

                                        <option>
                                            Green Valley Hospital
                                        </option>

                                        <option>
                                            Sunrise Medical Center
                                        </option>
                                    </select>

                                    <div class="hospital-hint">
                                        Optional — can be assigned later
                                    </div>
                                </div>
                            </div>

                            <div class="doctor-actions">
                                <button class="btn btn-reject">
                                    Reject Application
                                </button>
                                <button class="btn btn-approve">
                                    ✓ Approve Doctor
                                </button>
                            </div>
                        </article>

                        <!-- DOCTOR 2 -->
                        <article class="pending-card">
                            <div class="doctor-card-main">
                                <div class="doctor-info">
                                    <div class="doctor-avatar">
                                        RP
                                    </div>
                                    <div>
                                        <h4>
                                            Dr. Riya Pradhan
                                        </h4>
                                        <p>
                                            MBBS, MS
                                        </p>
                                        <div class="doctor-email">
                                            riya.pradhan@example.com
                                        </div>
                                    </div>

                                </div>

                                <div class="credential-grid">
                                    <div class="credential">
                                        <span>Specialization</span>
                                        <strong>
                                            <span class="specialization">
                                                Orthopedics
                                            </span>
                                        </strong>
                                    </div>

                                    <div class="credential">
                                        <span>License Number</span>

                                        <strong>
                                            NMC-62391
                                        </strong>
                                    </div>

                                    <div class="credential">
                                        <span>Experience</span>

                                        <strong>
                                            5 Years
                                        </strong>
                                    </div>
                                </div>

                                <div class="hospital-control">
                                    <label>
                                        Initial Hospital Assignment
                                    </label>

                                    <select>
                                        <option>
                                            Select hospital...
                                        </option>

                                        <option>
                                            City Care Hospital
                                        </option>

                                        <option>
                                            Green Valley Hospital
                                        </option>

                                        <option>
                                            Sunrise Medical Center
                                        </option>
                                    </select>

                                    <div class="hospital-hint">
                                        Optional — can be assigned later
                                    </div>
                                </div>
                            </div>

                            <div class="doctor-actions">
                                <button class="btn btn-reject">
                                    Reject Application
                                </button>

                                <button class="btn btn-approve">
                                    ✓ Approve Doctor
                                </button>
                            </div>

                        </article>

                        <!-- DOCTOR 3 -->
                        <article class="pending-card">
                            <div class="doctor-card-main">
                                <div class="doctor-info">
                                    <div class="doctor-avatar">
                                        SK
                                    </div>
                                    <div>

                                        <h4>
                                            Dr. Suman Karki
                                        </h4>

                                        <p>
                                            MBBS, MD
                                        </p>

                                        <div class="doctor-email">
                                            suman.karki@example.com
                                        </div>
                                    </div>
                                </div>

                                <div class="credential-grid">
                                    <div class="credential">
                                        <span>Specialization</span>
                                        <strong>
                                            <span class="specialization">
                                                Dermatology
                                            </span>
                                        </strong>
                                    </div>

                                    <div class="credential">
                                        <span>License Number</span>
                                        <strong>
                                            NMC-78124
                                        </strong>
                                    </div>
                                    <div class="credential">
                                        <span>Experience</span>
                                        <strong>
                                            11 Years
                                        </strong>
                                    </div>
                                </div>

                                <div class="hospital-control">
                                    <label>
                                        Initial Hospital Assignment
                                    </label>
                                    <select>
                                        <option>
                                            Select hospital...
                                        </option>

                                        <option>
                                            City Care Hospital
                                        </option>

                                        <option>
                                            Green Valley Hospital
                                        </option>

                                        <option>
                                            Sunrise Medical Center
                                        </option>
                                    </select>

                                    <div class="hospital-hint">
                                        Optional — can be assigned later
                                    </div>
                                </div>
                            </div>

                            <div class="doctor-actions">

                                <button class="btn btn-reject">
                                    Reject Application
                                </button>

                                <button class="btn btn-approve">
                                    ✓ Approve Doctor
                                </button>

                            </div>

                        </article>

                    </div>

                </section>


                <!-- =================================================
                 VERIFIED DOCTORS
            ================================================== -->

                <section class="section">

                    <div class="section-header">

                        <div class="section-title">

                            <div class="section-icon"
                                style="background:var(--success-soft);color:var(--success)">
                                ✓
                            </div>

                            <div>
                                <h3>Verified Doctors</h3>

                                <p>
                                    Manage hospital affiliations and assignments
                                </p>
                            </div>

                        </div>

                        <span class="section-count"
                            style="background:var(--success-soft);color:var(--success)">
                            18 doctors
                        </span>

                    </div>


                    <div class="verified-grid">


                        <!-- VERIFIED DOCTOR 1 -->

                        <article class="verified-card">

                            <div class="verified-top">

                                <div class="verified-doctor">

                                    <div class="verified-avatar">
                                        AM
                                    </div>

                                    <div>
                                        <h4>
                                            Dr. Anish Mehta
                                        </h4>

                                        <p>
                                            Neurologist · MD
                                        </p>
                                    </div>

                                </div>

                                <span class="verified-badge">
                                    ✓ Verified
                                </span>

                            </div>


                            <div class="doctor-meta">

                                <div class="meta-item">
                                    <span>Login ID</span>
                                    <strong>DOC-1024</strong>
                                </div>

                                <div class="meta-item">
                                    <span>License</span>
                                    <strong>NMC-34891</strong>
                                </div>

                                <div class="meta-item">
                                    <span>Experience</span>
                                    <strong>12 Years</strong>
                                </div>

                            </div>


                            <div class="affiliation-header">

                                <span>
                                    Hospital Affiliations
                                </span>

                                <small>
                                    2 active
                                </small>

                            </div>


                            <div class="hospital-list">

                                <div class="hospital-row">

                                    <div class="hospital-name">

                                        <div class="hospital-icon">
                                            🏥
                                        </div>

                                        City Care Hospital

                                    </div>

                                    <span class="hospital-status active">
                                        ● Active
                                    </span>

                                </div>


                                <div class="hospital-row">

                                    <div class="hospital-name">

                                        <div class="hospital-icon">
                                            🏥
                                        </div>

                                        Green Valley Hospital

                                    </div>

                                    <span class="hospital-status active">
                                        ● Active
                                    </span>

                                </div>

                            </div>


                            <div class="card-footer">

                                <select>

                                    <option>
                                        Add another hospital...
                                    </option>

                                    <option>
                                        Sunrise Medical Center
                                    </option>

                                    <option>
                                        Metro Hospital
                                    </option>

                                </select>

                                <button class="assign-btn">
                                    + Assign
                                </button>

                            </div>

                        </article>


                        <!-- VERIFIED DOCTOR 2 -->

                        <article class="verified-card">

                            <div class="verified-top">

                                <div class="verified-doctor">

                                    <div class="verified-avatar">
                                        NP
                                    </div>

                                    <div>
                                        <h4>
                                            Dr. Nisha Pandey
                                        </h4>

                                        <p>
                                            Pediatrician · MD
                                        </p>
                                    </div>

                                </div>

                                <span class="verified-badge">
                                    ✓ Verified
                                </span>

                            </div>


                            <div class="doctor-meta">

                                <div class="meta-item">
                                    <span>Login ID</span>
                                    <strong>DOC-1031</strong>
                                </div>

                                <div class="meta-item">
                                    <span>License</span>
                                    <strong>NMC-59201</strong>
                                </div>

                                <div class="meta-item">
                                    <span>Experience</span>
                                    <strong>7 Years</strong>
                                </div>

                            </div>


                            <div class="affiliation-header">

                                <span>
                                    Hospital Affiliations
                                </span>

                                <small>
                                    1 active
                                </small>

                            </div>


                            <div class="hospital-list">

                                <div class="hospital-row">

                                    <div class="hospital-name">

                                        <div class="hospital-icon">
                                            🏥
                                        </div>

                                        Sunrise Medical Center

                                    </div>

                                    <span class="hospital-status active">
                                        ● Active
                                    </span>

                                </div>


                                <div class="hospital-row left">

                                    <div class="hospital-name">

                                        <div class="hospital-icon">
                                            🏥
                                        </div>

                                        City Care Hospital

                                    </div>

                                    <span class="hospital-status left">
                                        Left
                                    </span>

                                </div>

                            </div>


                            <div class="card-footer">

                                <select>

                                    <option>
                                        Add another hospital...
                                    </option>

                                    <option>
                                        Green Valley Hospital
                                    </option>

                                    <option>
                                        Metro Hospital
                                    </option>

                                </select>

                                <button class="assign-btn">
                                    + Assign
                                </button>

                            </div>

                        </article>


                        <!-- VERIFIED DOCTOR 3 -->

                        <article class="verified-card">

                            <div class="verified-top">

                                <div class="verified-doctor">

                                    <div class="verified-avatar">
                                        RS
                                    </div>

                                    <div>
                                        <h4>
                                            Dr. Rahul Shah
                                        </h4>

                                        <p>
                                            Cardiologist · MD
                                        </p>
                                    </div>

                                </div>

                                <span class="verified-badge">
                                    ✓ Verified
                                </span>

                            </div>


                            <div class="doctor-meta">

                                <div class="meta-item">
                                    <span>Login ID</span>
                                    <strong>DOC-1047</strong>
                                </div>

                                <div class="meta-item">
                                    <span>License</span>
                                    <strong>NMC-42187</strong>
                                </div>

                                <div class="meta-item">
                                    <span>Experience</span>
                                    <strong>15 Years</strong>
                                </div>

                            </div>


                            <div class="affiliation-header">

                                <span>
                                    Hospital Affiliations
                                </span>

                                <small>
                                    1 active
                                </small>

                            </div>


                            <div class="hospital-list">

                                <div class="hospital-row">

                                    <div class="hospital-name">

                                        <div class="hospital-icon">
                                            🏥
                                        </div>

                                        Green Valley Hospital

                                    </div>

                                    <span class="hospital-status active">
                                        ● Active
                                    </span>

                                </div>

                            </div>


                            <div class="card-footer">

                                <select>

                                    <option>
                                        Add another hospital...
                                    </option>

                                    <option>
                                        City Care Hospital
                                    </option>

                                    <option>
                                        Sunrise Medical Center
                                    </option>

                                </select>

                                <button class="assign-btn">
                                    + Assign
                                </button>

                            </div>

                        </article>


                        <!-- VERIFIED DOCTOR 4 -->

                        <article class="verified-card">

                            <div class="verified-top">

                                <div class="verified-doctor">

                                    <div class="verified-avatar">
                                        SM
                                    </div>

                                    <div>
                                        <h4>
                                            Dr. Sara Mishra
                                        </h4>

                                        <p>
                                            General Physician · MBBS
                                        </p>
                                    </div>

                                </div>

                                <span class="verified-badge">
                                    ✓ Verified
                                </span>

                            </div>


                            <div class="doctor-meta">

                                <div class="meta-item">
                                    <span>Login ID</span>
                                    <strong>DOC-1053</strong>
                                </div>

                                <div class="meta-item">
                                    <span>License</span>
                                    <strong>NMC-67234</strong>
                                </div>

                                <div class="meta-item">
                                    <span>Experience</span>
                                    <strong>9 Years</strong>
                                </div>

                            </div>


                            <div class="affiliation-header">

                                <span>
                                    Hospital Affiliations
                                </span>

                                <small>
                                    2 active
                                </small>

                            </div>


                            <div class="hospital-list">

                                <div class="hospital-row">

                                    <div class="hospital-name">

                                        <div class="hospital-icon">
                                            🏥
                                        </div>

                                        Metro Hospital
                                    </div>

                                    <span class="hospital-status active">
                                        ● Active
                                    </span>

                                </div>


                                <div class="hospital-row">

                                    <div class="hospital-name">

                                        <div class="hospital-icon">
                                            🏥
                                        </div>

                                        City Care Hospital

                                    </div>

                                    <span class="hospital-status active">
                                        ● Active
                                    </span>

                                </div>

                            </div>


                            <div class="card-footer">

                                <select>

                                    <option>
                                        Add another hospital...
                                    </option>

                                    <option>
                                        Green Valley Hospital
                                    </option>

                                    <option>
                                        Sunrise Medical Center
                                    </option>

                                </select>

                                <button class="assign-btn">
                                    + Assign
                                </button>

                            </div>

                        </article>

                    </div>

                </section>

            </div>

        </main>

    </div>

</body>

</html>