<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Honey Badger | Autonomous Command Center</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/honey-badger.css">
    <!-- Security Script -->
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.onkeydown = function(e) {
            if(e.keyCode == 123) { return false; }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) { return false; }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) { return false; }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) { return false; }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) { return false; }
        }
    </script>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <a href="index.html" class="brand">
        <i class="fas fa-microchip"></i> The Honey Badger
    </a>
    
    <div class="nav-item">
        <a href="#" class="nav-link active" onclick="switchView('dashboard', this)">
            <i class="fas fa-th-large"></i> Dashboard
        </a>
    </div>
    <div class="nav-item">
        <a href="#" class="nav-link" onclick="switchView('agents', this)">
            <i class="fas fa-robot"></i> Agent Controls
        </a>
    </div>
    <div class="nav-item">
        <a href="#" class="nav-link" onclick="switchView('workflows', this)">
            <i class="fas fa-network-wired"></i> Workflows
        </a>
    </div>
    <div class="nav-item">
        <a href="#" class="nav-link" onclick="switchView('vault', this)">
            <i class="fas fa-database"></i> Vault
        </a>
    </div>
    
    <div style="margin-top: auto;">
        <div class="glass-panel" style="padding: 15px; border-radius: 12px; margin-bottom: 20px;">
            <div class="resource-label"><span>NPU Usage</span> <span id="npu-val">0%</span></div>
            <div class="progress-track"><div class="progress-fill" id="npu-bar" style="width: 0%"></div></div>
            
            <div class="resource-label"><span>Memory</span> <span id="mem-val">0GB</span></div>
            <div class="progress-track"><div class="progress-fill" id="mem-bar" style="width: 0%; background: #2980b9; box-shadow: 0 0 10px #2980b9;"></div></div>
        </div>
        
        <a href="index.html" class="nav-link">
            <i class="fas fa-sign-out-alt"></i> Exit Demo
        </a>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <div style="display: flex; align-items: center; gap: 15px;">
            <i class="fas fa-bars menu-toggle" onclick="document.getElementById('sidebar').classList.toggle('active')"></i>
            <div>
                <h2 style="margin:0; font-weight: 700; letter-spacing: -1px;">Command Center</h2>
                <div style="display: flex; align-items: center; gap: 8px; margin-top: 5px;">
                    <span class="status-dot" style="background: var(--success); box-shadow: 0 0 8px var(--success);"></span>
                    <span style="color: var(--text-secondary); font-size: 0.9rem;">System Distributed • <span style="color: #fff;">v2.4.0 (Stable)</span></span>
                </div>
            </div>
        </div>
        <div class="user-profile" onclick="toggleProfileMenu(event)">
            <div style="text-align: right; display: none; display: md-block; margin-right: 15px;">
                <div style="font-weight: 600; color: #fff;">Admin User</div>
                <div style="font-size: 0.8rem; color: var(--text-secondary);">admin@honeybadger.ai</div>
            </div>
            <div style="width: 45px; height: 45px; border-radius: 50%; background: linear-gradient(135deg, #333, #111); display: flex; align-items: center; justify-content: center; border: 1px solid #444;">
                <i class="fas fa-user-astronaut" style="color: #fff;"></i>
            </div>
            
            <!-- Dropdown Menu -->
            <div class="profile-dropdown" id="profile-dropdown">
                <div class="dropdown-item"><i class="fas fa-user"></i> My Profile</div>
                <div class="dropdown-item"><i class="fas fa-cog"></i> Settings</div>
                <div class="dropdown-divider"></div>
                <a href="index.html" class="dropdown-item" style="color: var(--danger);"><i class="fas fa-sign-out-alt" style="color: var(--danger);"></i> Logout</a>
            </div>
        </div>
    </div>

    <!-- VIEW: DASHBOARD -->
    <div id="view-dashboard" class="view-section active">
        <!-- Stats Grid -->
        <div class="row g-4">
            
            <!-- SHIFT SALES -->
            <div class="col-md-6 col-xl-3">
                <div class="glass-panel">
                    <div class="agent-header">
                        <div class="agent-icon"><i class="fas fa-bullseye"></i></div>
                        <div class="status-badge active" id="badge-sales"><div class="status-dot"></div> <span id="text-sales">Running</span></div>
                    </div>
                    <h5 style="font-weight: 600;">Shift Sales</h5>
                    <div class="mt-4">
                        <div class="metric-value"><span id="metric-meetings">14</span></div>
                        <div class="metric-label">Meetings Booked</div>
                    </div>
                </div>
            </div>

            <!-- SHIFT OPS -->
            <div class="col-md-6 col-xl-3">
                <div class="glass-panel">
                    <div class="agent-header">
                        <div class="agent-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                        <div class="status-badge active" id="badge-ops"><div class="status-dot"></div> <span id="text-ops">Running</span></div>
                    </div>
                    <h5 style="font-weight: 600;">Shift Ops</h5>
                    <div class="mt-4">
                        <div class="metric-value">$<span id="metric-revenue">45.2</span>k</div>
                        <div class="metric-label">Revenue Recovered</div>
                    </div>
                </div>
            </div>

            <!-- SHIFT MART -->
            <div class="col-md-6 col-xl-3">
                <div class="glass-panel">
                    <div class="agent-header">
                        <div class="agent-icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="status-badge stopped" id="badge-mart"><div class="status-dot"></div> <span id="text-mart">Stopped</span></div>
                    </div>
                    <h5 style="font-weight: 600;">Shift Mart</h5>
                    <div class="mt-4">
                        <div class="metric-value"><span id="metric-savings">18.4</span>%</div>
                        <div class="metric-label">Avg. Savings</div>
                    </div>
                </div>
            </div>

            <!-- SHIFT VAULT -->
            <div class="col-md-6 col-xl-3">
                <div class="glass-panel">
                    <div class="agent-header">
                        <div class="agent-icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="status-badge active" id="badge-vault"><div class="status-dot"></div> <span id="text-vault">Running</span></div>
                    </div>
                    <h5 style="font-weight: 600;">Shift Vault</h5>
                    <div class="mt-4">
                        <div class="metric-value"><span id="metric-vectors">1.2</span>M</div>
                        <div class="metric-label">Vectors Indexed</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Terminal Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="terminal-window">
                    <div class="terminal-header">
                        <div class="term-dot red"></div>
                        <div class="term-dot yellow"></div>
                        <div class="term-dot green"></div>
                        <span style="font-size: 0.8rem; color: #666; margin-left: 10px;">root@honeybadger-core:~</span>
                    </div>
                    <div class="terminal-body" id="terminal-output">
                        <div>> System initialized successfully...</div>
                        <div>> Connected to Local Vector Store (3ms latency)...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VIEW: AGENT CONTROLS -->
    <div id="view-agents" class="view-section">
        <h3 class="mb-4">Agent Configuration</h3>
        <div class="row g-4">
            <!-- Sales Control -->
            <div class="col-md-6 col-xl-4">
                <div class="glass-panel">
                    <div style="display:flex; gap:15px; margin-bottom:20px;">
                        <div class="agent-icon"><i class="fas fa-bullseye"></i></div>
                        <div>
                            <h5 style="margin:0;">Shift Sales</h5>
                            <small class="text-muted" style="color: var(--accent-color) !important;">The Hunter</small>
                        </div>
                    </div>
                    <p style="color: #aaa; font-size: 0.9rem; min-height: 40px;">Autonomous SDR. Uses Agentic Research to find non-obvious triggers on LinkedIn & X.</p>
                    <button class="btn-control stop" id="btn-sales" onclick="toggleAgent('sales')">Stop Agent</button>
                    <div style="margin-top: 15px; font-size: 0.8rem; color: #666;">
                        <i class="fas fa-circle" style="color: var(--success);"></i> 7 Active Threads
                    </div>
                </div>
            </div>

            <!-- Ops Control -->
            <div class="col-md-6 col-xl-4">
                <div class="glass-panel">
                    <div style="display:flex; gap:15px; margin-bottom:20px;">
                        <div class="agent-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                        <div>
                            <h5 style="margin:0;">Shift Ops</h5>
                            <small class="text-muted" style="color: var(--accent-color) !important;">The Controller</small>
                        </div>
                    </div>
                    <p style="color: #aaa; font-size: 0.9rem; min-height: 40px;">Solves Admin Anxiety. Visual LLM extracts data from messy PDFs and chases invoices.</p>
                    <button class="btn-control stop" id="btn-ops" onclick="toggleAgent('ops')">Stop Agent</button>
                </div>
            </div>

            <!-- Mart Control -->
            <div class="col-md-6 col-xl-4">
                <div class="glass-panel">
                    <div style="display:flex; gap:15px; margin-bottom:20px;">
                        <div class="agent-icon"><i class="fas fa-shopping-cart"></i></div>
                        <div>
                            <h5 style="margin:0;">Shift Mart</h5>
                            <small class="text-muted" style="color: var(--accent-color) !important;">The Negotiator</small>
                        </div>
                    </div>
                    <p style="color: #aaa; font-size: 0.9rem; min-height: 40px;">AI Procurement Bot. Emails 10+ suppliers and uses Game Theory approaches to save money.</p>
                    <button class="btn-control start" id="btn-mart" onclick="toggleAgent('mart')">Start Agent</button>
                </div>
            </div>
            
             <!-- Vault Control (Added for completeness functionality) -->
            <div class="col-md-6 col-xl-4">
                <div class="glass-panel">
                     <div style="display:flex; gap:15px; margin-bottom:20px;">
                        <div class="agent-icon"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <h5 style="margin:0;">Shift Vault</h5>
                            <small class="text-muted" style="color: var(--accent-color) !important;">The Brain</small>
                        </div>
                    </div>
                    <p style="color: #aaa; font-size: 0.9rem; min-height: 40px;">Private Memory Core. Indexes PDFs/Notion locally. Zero data leaves premises.</p>
                    <button class="btn-control stop" id="btn-vault" onclick="toggleAgent('vault')">Stop Agent</button>
                </div>
            </div>
        </div>
    </div>

    <!-- VIEW: WORKFLOWS -->
    <div id="view-workflows" class="view-section">
        <h3 class="mb-4">Active Workflows</h3>
        <div class="glass-panel" style="padding: 0; overflow: hidden;">
            <table class="table table-dark table-hover mb-0" style="background: transparent;">
                <thead>
                    <tr style="border-bottom: 1px solid #333;">
                        <th class="p-3">ID</th>
                        <th class="p-3">Workflow Name</th>
                        <th class="p-3">Agent</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Latency</th>
                    </tr>
                </thead>
                <tbody style="border-top: none;">
                    <tr>
                        <td class="p-3 text-secondary">#WF-9021</td>
                        <td class="p-3">B2B Negotiation (MacBooks)</td>
                        <td class="p-3">Shift Mart</td>
                        <td class="p-3"><span class="badge bg-warning bg-opacity-10 text-warning">Waiting for Vendor</span></td>
                        <td class="p-3">124ms</td>
                    </tr>
                    <tr>
                        <td class="p-3 text-secondary">#WF-9020</td>
                        <td class="p-3">Invoice Extraction (Visual)</td>
                        <td class="p-3">Shift Ops</td>
                        <td class="p-3"><span class="badge bg-success bg-opacity-10 text-success">Processing</span></td>
                        <td class="p-3">450ms</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- VIEW: VAULT -->
    <div id="view-vault" class="view-section">
        <h3 class="mb-4">Shift Vault (The Brain)</h3>
        <div class="row">
            <div class="col-md-8">
                <div class="glass-panel">
                    <h5 class="mb-4">Local Knowledge Vector</h5>
                    <div style="height: 300px; background: rgba(0,0,0,0.3); border-radius: 12px; display: flex; align-items: center; justify-content: center; border: 1px dashed #444;">
                        <div class="text-center text-secondary">
                            <i class="fas fa-project-diagram fa-2x mb-2"></i>
                            <p>Private Memory Index Visualization</p>
                            <small>Data Source: Localhost (Notion, PDF, Slack)</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-panel">
                    <h5>Stats</h5>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex justify-content-between mb-3 pb-2 border-bottom border-secondary border-opacity-25">
                            <span class="text-secondary">Vectors Indexed</span>
                            <strong>1,240,592</strong>
                        </li>
                        <li class="d-flex justify-content-between mb-3 pb-2 border-bottom border-secondary border-opacity-25">
                            <span class="text-secondary">Storage Used</span>
                            <strong>4.2 GB</strong>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="text-secondary">Hardware</span>
                            <span class="text-success"><i class="fas fa-server"></i> SATURN Ready</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Simulation Logic -->
<script>
    // --- State Management ---
    // LOGIC UPDATED TO MATCH 'WORK-AS-A-SERVICE' ECOSYSTEM
    const systemState = {
        sales: { 
            active: true, 
            name: 'Shift Sales', 
            logs: [
                "Scanning LinkedIn profile for 'Target Co'...", 
                "Detected trigger: 'Just opened new Austin office'...", 
                "Agentic Research: Mapping organizational chart...", 
                "Drafting hyper-personalized email (Context: Expansion)...", 
                "Sending outreach to VP of Sales...", 
                "Follow-up scheduled: Day 3 (No-response protocol)...",
                "Meeting Booked! Notifying human..." 
            ] 
        },
        ops: { 
            active: true, 
            name: 'Shift Ops', 
            logs: [
                "Ingesting Invoice #INV-2049 (Format: PDF)...", 
                "Visual LLM: Extracting line items from unstructured table...", 
                "Cross-checking against Purchase Order #PO-991...", 
                "Pushing data to Quickbooks API...", 
                "Alert: Client 'TechCorp' is 5 days overdue...",
                "Drafting polite 'Chasing Debt' email...",
                "Payment successfully verified in Stripe."
            ] 
        },
        mart: { 
            active: false, 
            name: 'Shift Mart', 
            logs: [
                "Received Request: 'Buy 50 MacBooks, Budget $100k'...", 
                "Emailing 10 Suppliers for quotes...", 
                "Received Quote: $98k. Status: Too high.",
                "Applying Game Theory tactic: 'Walk Away'...",
                "Supplier A counter-offer: $92k...",
                "Negotiating bulk-shipping waiver...",
                "Deal Signed. Saving generated: $4,500."
            ] 
        },
        vault: { 
            active: true, 
            name: 'Shift Vault', 
            logs: [
                "Indexing local folder: /Documents/TradeSecrets...", 
                "Embedding generator running on local NPU...", 
                "Ingesting Notion workspace export...",
                "Optimizing vector shards for retrieval...",
                "Private Chat Query: 'What is our Q3 strategy?'...",
                "Retrieving answer from local context (Zero egress)..."
            ] 
        }
    };

    // --- Navigation ---
    function switchView(viewName, linkElement) {
        document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active'));
        document.getElementById('view-' + viewName).classList.add('active');
        document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));
        linkElement.classList.add('active');
    }

    // --- Agent Control Logic ---
    function toggleAgent(agentKey) {
        const agent = systemState[agentKey];
        agent.active = !agent.active;
        
        // Update UI Badge
        const badge = document.getElementById(`badge-${agentKey}`);
        const text = document.getElementById(`text-${agentKey}`);
        
        if (badge && text) {
            if (agent.active) {
                badge.className = 'status-badge active';
                text.innerText = 'Running';
            } else {
                badge.className = 'status-badge stopped';
                text.innerText = 'Stopped';
            }
        }
        
        // Update Button
        const btn = document.getElementById(`btn-${agentKey}`);
        if (btn) {
            if (agent.active) {
                btn.className = 'btn-control stop';
                btn.innerText = 'Stop Agent';
            } else {
                btn.className = 'btn-control start';
                btn.innerText = 'Start Agent';
            }
        }
        
        logToTerminal(`System`, `User manually ${agent.active ? 'started' : 'stopped'} ${agent.name}.`);
    }

    // --- Simulation Core ---
    function logToTerminal(source, message) {
        const term = document.getElementById('terminal-output');
        const line = document.createElement('div');
        const time = new Date().toLocaleTimeString('en-US', { hour12: false });
        line.className = 'log-entry';
        line.innerHTML = `<span style="color:#666;">[${time}]</span> <span style="color:var(--accent-color);">${source}:</span> ${message}`;
        term.appendChild(line);
        term.scrollTop = term.scrollHeight; // Auto scroll
        
        // Limit history
        if(term.children.length > 50) term.removeChild(term.firstChild);
    }

    function simulationLoop() {
        // 1. Pick a random agent
        const keys = Object.keys(systemState);
        const randomKey = keys[Math.floor(Math.random() * keys.length)];
        const agent = systemState[randomKey];

        // 2. If active, generate log and update metrics
        if (agent.active) {
            // Log
            if (Math.random() > 0.4) {
                const randomMsg = agent.logs[Math.floor(Math.random() * agent.logs.length)];
                logToTerminal(agent.name, randomMsg);
            }
            
            // Metric Updates
            if (randomKey === 'sales') {
                const el = document.getElementById('metric-meetings');
                if (Math.random() > 0.8) el.innerText = parseInt(el.innerText) + 1;
            }
            if (randomKey === 'ops') {
                const el = document.getElementById('metric-revenue');
                 if (Math.random() > 0.7) el.innerText = (parseFloat(el.innerText) + 0.1).toFixed(1);
            }
            if (randomKey === 'mart') {
                 // Mart is stopped by default, so this won't run unless started
                 const el = document.getElementById('metric-savings');
                 el.innerText = (parseFloat(el.innerText) + 0.01).toFixed(1);
            }
        }
    }

    function resourceMonitorLoop() {
        // Simulate hardware fluctuation
        const npu = Math.floor(Math.random() * 40) + 10; // 10-50%
        const mem = (Math.random() * 2 + 4).toFixed(1); // 4-6GB
        
        document.getElementById('npu-bar').style.width = npu + '%';
        document.getElementById('npu-val').innerText = npu + '%';
        
        document.getElementById('mem-bar').style.width = (mem/16)*100 + '%'; // Assert 16GB total
        document.getElementById('mem-val').innerText = mem + 'GB';
    }

    // Init loops
    setInterval(simulationLoop, 1500);
    setInterval(resourceMonitorLoop, 2000);

    // --- Profile Menu Logic ---
    function toggleProfileMenu(event) {
        event.stopPropagation(); // Prevent immediate closing
        document.getElementById('profile-dropdown').classList.toggle('show');
    }

    // Close menu when clicking outside
    window.onclick = function(event) {
        if (!event.target.closest('.user-profile')) {
            var dropdowns = document.getElementsByClassName("profile-dropdown");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

</script>

</body>
</html>
<?php
$html_content = ob_get_clean();
$encrypted_content = '';
for ($i = 0; $i < strlen($html_content); $i++) {
    $encrypted_content .= '%' . bin2hex($html_content[$i]);
}
?>
<script type="text/javascript">
    document.write(unescape('<?php echo $encrypted_content; ?>'));
</script>
