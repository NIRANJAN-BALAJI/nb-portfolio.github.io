// --- 1. CONFIG: EXACT USER DATA ---
const DB = {
    users: [
        { id: 'u1', name: 'User 1', sub: 'Sakthi', bal: 1365.07, emg: 125.4, color: '#FFB74D' },
        { id: 'u2', name: 'User 2', sub: 'Sudhar', bal: 1400.57, emg: 493.0, color: '#4DB6AC' },
        { id: 'u3', name: 'User 3', sub: 'Prasanna', bal: 1394.60, emg: 542.9, color: '#9575CD' },
        { id: 'u4', name: 'User 4', sub: 'Harun', bal: 1450.00, emg: 500.0, color: '#64B5F6' }
    ],
    transactions: [
        { id: 1, title: 'Pool Contribution', date: 'Oct 01', amt: 4500, type: 'credit' },
        { id: 2, title: 'Snacks & Tea', date: 'Oct 05', amt: -340, type: 'debit' }
    ],
    totalBal: 4160
};

let STATE = {
    splitMode: 'equal', // 'equal' | 'unequal'
    selectedForEqual: ['u1', 'u2', 'u3', 'u4'] // Default all
};

function init() {
    render();

    // Remove real-time listener
}

function applyEqualSplit() {
    // Only render UI when explicitly requested
    if (STATE.splitMode === 'equal') {
        renderSplitUI();
    }
}

function render() {
    // 1. Total
    document.getElementById('global-balance').innerText = DB.totalBal.toLocaleString();

    // 2. Member Cards
    const scroller = document.getElementById('member-scroller');
    scroller.innerHTML = DB.users.map(u => `
            <div class="stat-card">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div class="stat-lbl">${u.name}</div>
                    <div style="width:10px; height:10px; border-radius:50%; background:${u.color};"></div>
                </div>
                <div class="stat-val">₹${u.bal.toFixed(2)}</div>
                <div class="stat-sub">rem. balance</div>
                
                <div style="margin-top:10px; padding-top:10px; border-top:1px solid rgba(0,0,0,0.05);">
                    <div class="stat-lbl" style="font-size:0.65rem;">Emergency Fund</div>
                    <div style="font-weight:600; font-size:0.9rem;">₹${u.emg}</div>
                </div>
            </div>
        `).join('');

    // 3. Transactions
    const list = document.getElementById('tx-history');
    list.innerHTML = DB.transactions.slice().reverse().map(t => `
            <div class="tx-item">
                <div style="display:flex; align-items:center;">
                    <div class="tx-icon">
                        ${t.amt > 0 ? '<i class="fas fa-arrow-down" style="color:#4CAF50;"></i>' : '<i class="fas fa-shopping-bag" style="color:#000;"></i>'}
                    </div>
                    <div class="tx-info">
                        <h5>${t.title}</h5>
                        <p>${t.date}</p>
                    </div>
                </div>
                <div class="tx-amt" style="color: ${t.amt > 0 ? '#4CAF50' : '#000'};">
                    ${t.amt > 0 ? '+' : ''}₹${Math.abs(t.amt)}
                </div>
            </div>
        `).join('');
}

// --- MODAL LOGIC ---
function openModal() {
    document.body.classList.add('modal-open');
    renderSplitUI();
}
function closeModal() { document.body.classList.remove('modal-open'); }

function setSplitMode(mode) {
    STATE.splitMode = mode;

    // UI Tabs Update
    const equalTab = document.getElementById('tab-equal');
    const unequalTab = document.getElementById('tab-unequal');

    if (mode === 'equal') {
        equalTab.classList.add('active');
        equalTab.style.color = 'var(--dark)';
        equalTab.style.borderBottom = '2px solid var(--dark)';

        unequalTab.classList.remove('active');
        unequalTab.style.color = '#aaa';
        unequalTab.style.borderBottom = 'none';

        document.getElementById('section-equal').style.display = 'block';
        document.getElementById('section-unequal').style.display = 'none';
    } else {
        unequalTab.classList.add('active');
        unequalTab.style.color = 'var(--dark)';
        unequalTab.style.borderBottom = '2px solid var(--dark)';

        equalTab.classList.remove('active');
        equalTab.style.color = '#aaa';
        equalTab.style.borderBottom = 'none';

        document.getElementById('section-equal').style.display = 'none';
        document.getElementById('section-unequal').style.display = 'block';
    }

    renderSplitUI();
}

function toggleBeneficiary(uid) {
    if (STATE.selectedForEqual.includes(uid)) {
        STATE.selectedForEqual = STATE.selectedForEqual.filter(id => id !== uid);
    } else {
        STATE.selectedForEqual.push(uid);
    }
    renderSplitUI();
}

function renderSplitUI() {
    // 0. Get current total
    const totalAmt = parseFloat(document.getElementById('inp-amt').value) || 0;

    // 1. Equal List (Google Pay Style)
    if (STATE.splitMode === 'equal') {
        const count = STATE.selectedForEqual.length;
        const perPerson = count > 0 ? (totalAmt / count).toFixed(2) : '0.00';

        const container = document.getElementById('section-equal');
        container.innerHTML = DB.users.map(u => {
            const isActive = STATE.selectedForEqual.includes(u.id);
            return `
                <div onclick="toggleBeneficiary('${u.id}')" style="display:flex; align-items:center; justify-content:space-between; padding:15px 0; border-bottom:1px solid #f9f9f9; cursor:pointer;">
                    <div style="display:flex; align-items:center; gap:15px;">
                        <div style="width:24px; height:24px; border-radius:50%; border:2px solid ${isActive ? 'var(--lime)' : '#ddd'}; display:flex; align-items:center; justify-content:center; background:${isActive ? 'var(--lime)' : 'transparent'};">
                            ${isActive ? '<i class="fas fa-check" style="font-size:0.7rem; color:black;"></i>' : ''}
                        </div>
                        <div style="width:40px; height:40px; border-radius:50%; background:${u.color}; display:flex; align-items:center; justify-content:center; color:white; font-size:0.9rem;">
                            ${u.sub.substring(0, 2)}
                        </div>
                        <span style="font-weight:600; font-size:1rem; opacity:${isActive ? '1' : '0.6'};">${u.sub}</span>
                    </div>
                    
                    <div style="font-weight:700; font-size:1rem; color:${isActive ? 'black' : '#ccc'};">
                        ₹${isActive ? perPerson : '0.00'}
                    </div>
                </div>
            `;
        }).join('');
    }

    // 2. Unequal List (Manual Inputs)
    if (STATE.splitMode === 'unequal') {
        const inputContainer = document.getElementById('section-unequal');
        // Only render if empty to avoid overwriting typed values on re-render, 
        // BUT for switching modes we might want to refresh. Let's just re-render for simplicity 
        // as per "empty" request.
        inputContainer.innerHTML = DB.users.map(u => `
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:15px; padding:10px; background:#f9f9f9; border-radius:15px;">
                <div style="display:flex; align-items:center; gap:10px;">
                    <div class="chip-avatar" style="background:${u.color}; width:35px; height:35px; font-size:0.8rem;">${u.sub.substring(0, 2)}</div>
                    <span style="font-weight:600;">${u.sub}</span>
                </div>
                <div style="display:flex; align-items:center; gap:5px;">
                    <span style="color:#aaa;">₹</span>
                    <input type="number" id="split-${u.id}" class="split-inp" placeholder="0" 
                           style="width:70px; border:none; background:transparent; font-weight:bold; font-size:1.1rem; text-align:right;">
                </div>
            </div>
        `).join('');
    }
}

function triggerDemo() {
    // 1. Set to Unequal Mode
    setSplitMode('unequal');

    // 2. Fill Data
    document.getElementById('inp-desc').value = 'Groceries';
    document.getElementById('inp-amt').value = 239;
    document.getElementById('inp-payer').value = 'u1'; // Sakthi

    // 3. Fill Splits (Wait for render)
    setTimeout(() => {
        document.getElementById('split-u1').value = 89.7;
        document.getElementById('split-u2').value = 59;
        document.getElementById('split-u3').value = 89.3;
    }, 50);
}

function submitExpense() {
    const amt = parseFloat(document.getElementById('inp-amt').value);
    if (!amt) return;

    if (STATE.splitMode === 'equal') {
        const count = STATE.selectedForEqual.length;
        if (count > 0) {
            const perPerson = amt / count;
            STATE.selectedForEqual.forEach(uid => {
                const u = DB.users.find(user => user.id === uid);
                if (u) u.bal -= perPerson;
            });
        }
    } else {
        // Unequal Logic
        DB.users.forEach(u => {
            const split = parseFloat(document.getElementById('split-' + u.id).value) || 0;
            u.bal -= split;
        });
    }

    // Update Total
    DB.totalBal -= amt;

    // Add Tx
    DB.transactions.push({
        id: Date.now(),
        title: document.getElementById('inp-desc').value,
        date: 'Oct 12',
        amt: -amt,
        type: 'debit'
    });

    render();
    closeModal();
}

init();