  @extends('backend.hub.layouts.master', ['page_slug' => 'dashboard'])
  @section('title', 'Dashboard')
  @section('content')
      <main class="d-flex" style="min-height: 100vh; bg-white">
          <!-- Main Content -->
          <div class="flex-grow-1 p-4">
              <!-- Top Bar -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                      <h2 class="fw-bold">Welcome back, {{ Auth::guard('staff')->user()->name }} 👋</h2>
                      <p class="text-muted mb-0">Here’s a quick overview of your dashboard.</p>
                  </div>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb mb-0 bg-white rounded px-3 py-2 shadow-sm">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                      </ol>
                  </nav>
              </div>

              <!-- Dashboard Cards -->
              <div class="row g-4">
                  <div class="col-md-4">
                      <div class="card shadow-sm border-0 h-100 hover-shadow">
                          <div class="card-body d-flex align-items-center">
                              <div class="bg-primary text-white rounded-circle p-3 me-3">
                                  <i class="bi bi-list-check fs-5"></i>
                              </div>
                              <div>
                                  <h6 class="text-muted">Pending Tasks</h6>
                                  <h4 class="fw-bold mb-0">12</h4>
                                  <span class="badge bg-warning text-dark mt-1">Needs Attention</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card shadow-sm border-0 h-100 hover-shadow">
                          <div class="card-body d-flex align-items-center">
                              <div class="bg-success text-white rounded-circle p-3 me-3">
                                  <i class="bi bi-check2-circle fs-5"></i>
                              </div>
                              <div>
                                  <h6 class="text-muted">Completed Reports</h6>
                                  <h4 class="fw-bold mb-0">34</h4>
                                  <span class="badge bg-success mt-1">Up to date</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card shadow-sm border-0 h-100 hover-shadow">
                          <div class="card-body d-flex align-items-center">
                              <div class="bg-info text-white rounded-circle p-3 me-3">
                                  <i class="bi bi-kanban fs-5"></i>
                              </div>
                              <div>
                                  <h6 class="text-muted">Active Projects</h6>
                                  <h4 class="fw-bold mb-0">5</h4>
                                  <span class="badge bg-info mt-1">In Progress</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>


          </div>
      </main>

  @endsection
