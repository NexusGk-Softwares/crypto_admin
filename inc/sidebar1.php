<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    
    <li class="nav-item nav-category">Management</li>
    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#user-management" aria-expanded="false" aria-controls="user-management">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="user-management">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="manage_users.php">Manage Users</a></li>
          <li class="nav-item"> <a class="nav-link" href="add_user.php">Add New User</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#transaction-management" aria-expanded="false" aria-controls="transaction-management">
        <i class="menu-icon mdi mdi-bank-transfer"></i>
        <span class="menu-title">Transactions</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="transaction-management">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="deposits.php">Deposits</a></li>
          <li class="nav-item"> <a class="nav-link" href="withdrawals.php">Withdrawals</a></li>
          <li class="nav-item"> <a class="nav-link" href="transfer_logs.php">Transfer Logs</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="settings.php">
        <i class="menu-icon mdi mdi-cog"></i>
        <span class="menu-title">Settings</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="commissions.php">
        <i class="menu-icon mdi mdi-cash-multiple"></i>
        <span class="menu-title">Commissions</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="referrals.php">
        <i class="menu-icon mdi mdi-account-plus"></i>
        <span class="menu-title">Referral Program</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="transactions.php">
        <i class="menu-icon mdi mdi-receipt"></i>
        <span class="menu-title">Transactions History</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="logout.php">
        <i class="menu-icon mdi mdi-logout"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>
  </ul>
</nav>
