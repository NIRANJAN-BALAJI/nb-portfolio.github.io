<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bachelor's Kanakku | Project Details</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/project.css">
    <link rel="stylesheet" href="assets/css/bachelor-kanakku.css">
</head>

<body>

    <div class="container">
        <div class="back-btn-container" style="margin-top: 50px;">
            <a href="projects.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Projects</a>
        </div>

        <div class="section-title">
            <h1><u>Bachelor's Kanakku</u></h1>
            <div class="project-tag" style="margin-top: 15px; font-size: 1rem;">Financial Management • Full Stack • Architecture</div>
        </div>

        <div class="project-detail-content">
            
            <div class="text-center mb-5">
                <a href="bachelors-kanakku-app.php" target="_blank" class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg">
                    <i class="fas fa-mobile-alt me-2"></i> Launch Live App (Demo)
                </a>
                <p class="text-muted mt-2 small">Interactive Mobile Simulation • Treasurer Dashboard</p>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                     <p class="lead"><strong>The Pre-paid Pooled Fund Model (PFM).</strong> A solution to centralized liquidity with distributed equity, solving the "Hot Potato" problem of rotating treasurers and physical cash in shared living spaces.</p>
                </div>
            </div>

            <hr style="border-color: #333;">

            <div class="mt-4">
                <h3>1. The Core Shift: "The Hot Potato" Protocol</h3>
                <p>In traditional models, one person acts as the permanent "Bank". In our reality, the "Bank" is a role that passes from one member to another each month (e.g., Nandha Gopal in Oct -> Niranjan in Nov).</p>
                
                <div class="highlight-box">
                    <h5>1.1 The "Handover" Challenge</h5>
                    <p>When the month ends, the system orchestrates a three-step atomic transaction:</p>
                    <ul>
                        <li><strong>Digital Close:</strong> The ledger for the current month is finalized.</li>
                        <li><strong>Physical Handover:</strong> The outgoing Treasurer must physically transfer the remaining cash (e.g., ₹4,261) to the incoming Treasurer.</li>
                        <li><strong>Liability Shift:</strong> The system records the transfer of liability for the funds.</li>
                    </ul>
                </div>

                <div class="highlight-box">
                    <h5>1.2 Dynamic Scalability</h5>
                    <ul>
                        <li><strong>Variable Contribution:</strong> Monthly contributions can be adjusted (e.g., ₹1,500 in Oct -> ₹2,000 in Nov).</li>
                        <li><strong>Member Churn:</strong> New members can join mid-stream without breaking historical data. The system recalculates the "Total Pot" dynamically.</li>
                    </ul>
                </div>
            </div>

            <div class="mt-5">
                <h3>2. Database Schema (Scalable)</h3>
                <p>The database decouples the Treasurer from the Group and attaches them to the Period (Month).</p>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card bg-dark text-light border-secondary h-100">
                            <div class="card-header border-secondary">Table 1: flat_pools ("The Apartment")</div>
                            <div class="card-body font-monospace small">
                                id: UUID<br>
                                name: "Flat 302"<br>
                                current_period_id: UUID (FK)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-light border-secondary h-100">
                            <div class="card-header border-secondary">Table 2: pool_members ("Dynamic List")</div>
                            <div class="card-body font-monospace small">
                                user_id: UUID<br>
                                pool_id: UUID<br>
                                status: ENUM('ACTIVE', 'LEFT')<br>
                                joined_date: DATE<br>
                                exit_date: DATE (Nullable)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-light border-secondary h-100">
                            <div class="card-header border-secondary">Table 3: financial_periods ("The Month")</div>
                            <div class="card-body font-monospace small">
                                id, pool_id: UUID<br>
                                month_name: "October 2025"<br>
                                treasurer_id: UUID (FK -> Users)<br>
                                contribution_amount: INTEGER<br>
                                status: ENUM('OPEN', 'HANDOVER', 'CLOSED')<br>
                                opening_balance: INTEGER<br>
                                closing_balance: INTEGER
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h3>3. The "Handover" Algorithm</h3>
                <p>The logic orchestrating the "Month End" transition.</p>
                
                <div class="accordion" id="accordionalgorithm">
                    <div class="accordion-item bg-dark text-light border-secondary">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button bg-secondary text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Step 1: The Audit (Old Treasurer)
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionalgorithm">
                            <div class="accordion-body">
                                <ul>
                                    <li>System sums all expenses.</li>
                                    <li>Calculates <code>Physical_Cash_Expected = Opening + Contributions - Expenses</code>.</li>
                                    <li>Treasurer confirms: "Yes, I have ₹5,082 in my hand."</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-dark text-light border-secondary">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button bg-secondary text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Step 2: The Setup
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionalgorithm">
                            <div class="accordion-body">
                                <ul>
                                    <li>Input Next Month's Rep.</li>
                                    <li>Input Next Month's Contribution Amount.</li>
                                    <li>Manage Member Changes (Add/Remove members).</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-dark text-light border-secondary">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button bg-secondary text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Step 3: The Transfer & Commit
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionalgorithm">
                            <div class="accordion-body">
                                <ul>
                                    <li>System creates <code>PENDING</code> period for November.</li>
                                    <li>Old Rep transfers cash to New Rep. New Rep clicks "Received".</li>
                                    <li><strong>Database Commit:</strong> Close October, Open November, Set Opening Balance, Generate Contribution Requests for new period.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h3>4. Developer Task Highlights</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="highlight-box">
                            <h6><i class="fas fa-code feature-icon"></i> Dynamic Period Creation</h6>
                            <code>POST /api/periods/start</code>
                            <p class="small mt-2">Creates ledger entries for new contributions immediately upon period start.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="highlight-box">
                            <h6><i class="fas fa-user-plus feature-icon"></i> Member Onboarding (Prorated)</h6>
                            <p class="small">Logic to handle mid-month joiners:</p>
                            <code class="small">Contribution = (Days_Remaining / Total_Days) * Base_Contribution</code>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h3>5. User Interface Concepts</h3>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card bg-dark text-light border-warning mb-3">
                            <div class="card-header bg-warning text-dark fw-bold"><i class="fas fa-vault"></i> The Vault Widget</div>
                            <div class="card-body text-center">
                                <h5 class="card-title">CURRENT VAULT (NOV)</h5>
                                <div class="my-3">
                                    <i class="fas fa-user-circle fa-3x"></i>
                                    <p class="mt-2 text-warning">"Money is safe with Niranjan"</p>
                                </div>
                                <button class="btn btn-outline-warning btn-sm">Call Rep</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-dark text-light border-info mb-3">
                            <div class="card-header bg-info text-dark fw-bold"><i class="fas fa-search-dollar"></i> The Auditor Widget</div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Cash in Hand</h5>
                                <h2 class="text-info">₹ 5,082</h2>
                                <p class="small text-muted">Total Collected - Total Spent</p>
                                <p class="small fst-italic">"Visible to everyone to ensure transparency."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
