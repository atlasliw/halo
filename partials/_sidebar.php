<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- Contact Management (Customers & Partners) -->
    <li class="nav-item">
      <a class="nav-link" href="contact_management.php">
        <i class="icon-people menu-icon"></i>
        <span class="menu-title">Contact Management</span>
      </a>
    </li>

    <!-- Products Management -->
    <li class="nav-item">
      <a class="nav-link" href="product_management.php">
        <i class="icon-layers menu-icon"></i>
        <span class="menu-title">Products</span>
      </a>
    </li>

    <!-- Subscriptions -->
    <li class="nav-item">
      <a class="nav-link" href="subscriptions.php">
        <i class="icon-key menu-icon"></i>
        <span class="menu-title">Subscriptions</span>
      </a>
    </li>

    <!-- Transactions -->
    <li class="nav-item">
      <a class="nav-link" href="transactions.php">
        <i class="icon-credit-card menu-icon"></i>
        <span class="menu-title">Transactions</span>
      </a>
    </li>

    <!-- Helpdesk Tickets -->
    <li class="nav-item">
      <a class="nav-link" href="helpdesk_tickets.php">
        <i class="icon-envelope-letter menu-icon"></i>
        <span class="menu-title">Helpdesk</span>
      </a>
    </li>

    <!-- System Logs -->
    <li class="nav-item">
      <a class="nav-link" href="system_logs.php">
        <i class="icon-shield menu-icon"></i>
        <span class="menu-title">System Logs</span>
      </a>
    </li>

    <!-- Reports & Analytics -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#reports-menu" aria-expanded="false" aria-controls="reports-menu">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Reports</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="reports-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="reports/subscriptions.php">
              <i class="ti-calendar menu-icon"></i> Subscription Report
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports/sales.php">
              <i class="ti-shopping-cart menu-icon"></i> Sales Report
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports/helpdesk_metrics.php">
              <i class="ti-headphone menu-icon"></i> Helpdesk Metrics
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports/data_analysis.php">
              <i class="ti-bar-chart menu-icon"></i> Data Analysis
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Administration (Users & Roles) -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#admin-menu" aria-expanded="false" aria-controls="admin-menu">
        <i class="icon-settings menu-icon"></i>
        <span class="menu-title">Administration</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="admin-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <i class="ti-user menu-icon"></i> Manage Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="roles.php">
              <i class="ti-lock menu-icon"></i> Manage Roles
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Lookup Data -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#lookup-menu" aria-expanded="false" aria-controls="lookup-menu">
        <i class="icon-notebook menu-icon"></i>
        <span class="menu-title">Lookup Data</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="lookup-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="company_types.php">
              <i class="ti-briefcase menu-icon"></i> Company Types
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="states.php">
              <i class="ti-map menu-icon"></i> States
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="industries.php">
              <i class="ti-briefcase menu-icon"></i> Industries
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sla_levels.php">
              <i class="ti-time menu-icon"></i> SLA Levels
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payment_terms.php">
              <i class="ti-receipt menu-icon"></i> Payment Terms
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="license_statuses.php">
              <i class="ti-tag menu-icon"></i> License Statuses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="license_types.php">
              <i class="ti-key menu-icon"></i> License Types
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="subscription_statuses.php">
              <i class="ti-bookmark menu-icon"></i> Subscription Statuses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transaction_statuses.php">
              <i class="ti-exchange-vertical menu-icon"></i> Transaction Statuses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ticket_statuses.php">
              <i class="ti-flag menu-icon"></i> Ticket Statuses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ticket_priorities.php">
              <i class="ti-star menu-icon"></i> Ticket Priorities
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="log_event_types.php">
              <i class="ti-alert menu-icon"></i> Log Event Types
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- System Configuration -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#config-menu" aria-expanded="false" aria-controls="config-menu">
        <i class="icon-equalizer menu-icon"></i>
        <span class="menu-title">System Config</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="config-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="config/general.php">
              <i class="ti-settings menu-icon"></i> General Settings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="config/email.php">
              <i class="ti-email menu-icon"></i> Email Settings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="config/integrations.php">
              <i class="ti-plug menu-icon"></i> Integrations
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="config/localization.php">
              <i class="ti-world menu-icon"></i> Localization
            </a>
          </li>
        </ul>
      </div>
    </li>

  </ul>
</nav>
