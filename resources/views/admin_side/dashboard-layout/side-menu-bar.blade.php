 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('adminDashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          {{--  --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
              <p>
                Account Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            {{--  --}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Account Setting</p>
                    </a>
                  </li>
                  {{--  --}}
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Account Setting</p>
                  </a>
                </li>
                {{--  --}}
              </ul>
          </li>
          {{--  --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
              <p>
                Company About
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            {{--  --}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('addCompanyForm') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Company</p>
                    </a>
                  </li>
                  {{--  --}}
                <li class="nav-item">
                  <a href="{{ route('listCompany') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Company Details</p>
                  </a>
                </li>
                {{--  --}}
              </ul>
          </li>
          {{--  --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-building"></i>
              <p>
                Departments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            {{--  --}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('addDepartmentForm') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Department</p>
                    </a>
                </li>
                  {{--  --}}
                <li class="nav-item">
                    <a href="{{ route('listDepartments') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                      <p>Department Details</p>
                    </a>
                </li>
                  {{--  --}}
              </ul>
          </li>
          {{--  --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Employees
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            {{--  --}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('userRegisterationPage') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New Users</p>
                    </a>
                  </li>
                  {{--  --}}
                  <li class="nav-item">
                      <a href="{{ route('listEmployee') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User List</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('requestApproval') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Request Approval</p>
                    </a>
                  </li>
                  {{--  --}}
                  {{--  --}}
                  <li class="nav-item">
                    <a href="{{ route('addEmployeeCategoryForm') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Emp Category</p>
                    </a>
                  </li>
                  {{--  --}}
                  <li class="nav-item">
                    <a href="{{ route('listEmployeeCategory') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                      <p>Employee Categories</p>
                    </a>
                  </li>
                  {{--  --}}
              </ul>
          </li>
          {{--  --}}
          {{--  --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-regular fa-envelope"></i>
              <p>
                Leaves
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> --}}
            {{--  --}}
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('listLeaves') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Incoming Leaves</p>
                  </a>
                </li> --}}
                {{--  --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('approveLeaves') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Leaves List</p>
                    </a>
                </li>
              </ul>
          </li> --}}
          {{--  --}}
          {{--  --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-regular fa-address-card"></i>
              <p>
                Directory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> --}}
            {{--  --}}
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/listAdmin" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Organization</p>
                  </a>
                </li>
              </ul>
          </li> --}}
          {{--  --}}
          {{--  --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-regular fa-calendar"></i>
              <p>
                Calender
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> --}}
            {{--  --}}
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/listAdmin" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Organization</p>
                  </a>
                </li>
              </ul>
          </li> --}}
          {{--  --}}
          {{--  --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-folder-open"></i>
              <p>
                Files
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> --}}
            {{--  --}}
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/listAdmin" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Organization</p>
                  </a>
                </li>
              </ul>
          </li> --}}
          {{--  --}}
          {{--  --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-chart-pie"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> --}}
            {{--  --}}
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/listAdmin" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Organization</p>
                  </a>
                </li>
              </ul>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
