<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>Bachelor's Kanakku | Monthly Tracker</title>
    <!-- Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bachelors-kanakku-app.css">
    <script src="assets/js/bachelors-kanakku-app.js"></script>
</head>
<body>

<div class="app-frame">
    
    <!-- HEADER -->
    <div class="top-bar">
        <div class="user-welcome">
            <span>Treasurer Dashboard</span>
            <h3>Hi, Niranjan</h3>
        </div>
        <div class="notification-btn">
            <i class="far fa-bell"></i>
        </div>
    </div>

    <!-- MAIN WALLET -->
    <div class="wallet-card">
        <div class="wallet-label">Total Operational Pot</div>
        <div class="wallet-amount">₹<span id="global-balance">0</span></div>
        
        <div class="actions-row">
            <button class="act-btn" onclick="openModal()">
                <i class="fas fa-paper-plane"></i> Add Expense
            </button>
            <button class="act-btn secondary">
                <i class="fas fa-chart-pie"></i> Analytics
            </button>
        </div>
    </div>

    <!-- INDIVIDUAL BREAKDOWN (Horizontal) -->
    <div class="section-header" style="padding-bottom:5px;">
        <span class="sec-title">Member Insights (Rem. Balance)</span>
    </div>
    
    <!-- Dynamic JS renders valid tracking here -->
    <div class="stats-scroller" id="member-scroller">
        <!-- JS Insert -->
    </div>

    <!-- RECENT -->
    <div class="section-header">
        <span class="sec-title">Recent Activity</span>
        <span style="font-size:0.85rem; color: var(--lime); cursor:pointer;">See All</span>
    </div>

    <div class="tx-list" id="tx-history">
        <!-- JS Insert -->
    </div>

    <!-- NAV -->
    <div class="bottom-nav">
        <div class="nav-link active"><i class="fas fa-home"></i></div>
        <div class="nav-link"><i class="fas fa-poll"></i></div>
        <div class="nav-btn-main" onclick="openModal()"><i class="fas fa-plus"></i></div>
        <div class="nav-link"><i class="fas fa-wallet"></i></div>
        <div class="nav-link"><i class="fas fa-user"></i></div>
    </div>

</div>

<!-- MODAL UI -->
<div class="modal-overlay" onclick="closeModal()"></div>
<div class="modal-body">
    <div style="width:50px; height:5px; background:#eee; margin:0 auto 20px; border-radius:10px;"></div>
    <h4 style="text-align:center;">New Expense</h4>
    
    <!-- 2-Column Split Input -->
    <div class="modal-input-row">
        <!-- Col 1: Name + Amount -->
        <div class="input-group-modern" style="flex:1.2;">
            <div class="lbl-sm">Payer & Amount</div>
            <div style="display:flex; align-items:center;">
                <!-- Payer Select -->
                <select id="inp-payer" class="inp-seamless payer-select" style="width:auto; margin-right:10px;">
                    <option value="u1">Niranjan</option>
                    <option value="u2">Nandha</option>
                    <option value="u3">Sakthi</option>
                    <option value="u4">Sudhar</option>
                    <option value="u5">Prasanna</option>
                </select>
                <div style="width:1px; height:20px; background:#ddd; margin-right:10px;"></div>
                <!-- Amount -->
                <div class="amt-wrapper" style="flex:1; position:relative;">
                    <span class="currency-prefix">₹</span>
                    <input type="number" id="inp-amt" class="amt-input-med">
                    <button onclick="applyEqualSplit()" style="position:absolute; right:0; top:50%; transform:translateY(-50%); background:var(--dark); color:var(--lime); border:none; padding:5px 12px; border-radius:12px; font-weight:bold; font-size:0.8rem; cursor:pointer;">OK</button>
                </div>
            </div>
        </div>

        <!-- Col 2: Grocery/Item List -->
        <div class="input-group-modern">
            <div class="lbl-sm">Product / Item</div>
            <input list="grocery-list" id="inp-desc" class="inp-seamless product-input" placeholder="Select...">
            <datalist id="grocery-list">
                <option value="Groceries">
                <option value="Vegetables">
                <option value="Milk & Dairy">
                <option value="Chicken/Meat">
                <option value="Snacks">
                <option value="Electricity Bill">
            </datalist>
        </div>
    </div>
    
    <!-- Auto-Demo Trigger -->
    <div style="text-align:center; margin-bottom:20px;">
        <span onclick="triggerDemo()" style="font-size:0.8rem; background:var(--lime); padding:5px 10px; border-radius:20px; cursor:pointer;">
            <i class="fas fa-magic"></i> Auto-Fill 'Groceries' (Demo)
        </span>
    </div>

    <!-- Google Pay Style Tabs -->
    <div class="split-tabs" style="display:flex; border-bottom:1px solid #eee; margin-bottom:15px;">
        <div id="tab-equal" class="split-tab active" onclick="setSplitMode('equal')" style="flex:1; text-align:center; padding:15px; cursor:pointer; color:var(--dark); border-bottom:2px solid var(--dark);">
            <i class="fas fa-user-group" style="margin-right:8px;"></i> Split evenly
        </div>
        <div id="tab-unequal" class="split-tab" onclick="setSplitMode('unequal')" style="flex:1; text-align:center; padding:15px; cursor:pointer; color:#aaa;">
            <i class="fas fa-hashtag" style="margin-right:8px;"></i> 123
        </div>
    </div>

    <!-- Equal Split Content -->
    <div id="section-equal" style="margin-bottom:20px; max-height:300px; overflow-y:auto;">
        <!-- JS Renders Rows -->
    </div>

    <!-- Unequal Split Content -->
    <div id="section-unequal" style="display:none; max-height:300px; overflow-y:auto;">
        <!-- JS Renders Inputs -->
    </div>

    <button onclick="submitExpense()" style="width:100%; padding:20px; background:var(--dark); color:var(--lime); border:none; border-radius:20px; font-weight:bold; font-size:1.1rem; margin-top:10px;">
        CONFIRM & PAY
    </button>
</div>

</body>
</html>
