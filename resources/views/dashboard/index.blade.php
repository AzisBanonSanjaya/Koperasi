@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="container my-5">
    <div class="row g-4">
        <!-- Total Users Card -->
        <div class="col-md-4">
            <div class="card bg-primary text-white h-100">
                <div class="card-header">Total Users</div>
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title">1,234</h5>
                    <p class="card-text">Number of registered users.</p>
                </div>
            </div>
        </div>

        <!-- Total Orders Card -->
        <div class="col-md-4">
            <div class="card bg-success text-white h-100">
                <div class="card-header">Total Orders</div>
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title">567</h5>
                    <p class="card-text">Number of completed orders.</p>
                </div>
            </div>
        </div>

        <!-- Revenue Card -->
        <div class="col-md-4">
            <div class="card bg-warning text-white h-100">
                <div class="card-header">Revenue</div>
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title">$12,345</h5>
                    <p class="card-text">Total revenue generated.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <!-- Recent Activity Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">Recent Activity</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Activity</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John Doe</td>
                                    <td>Logged in</td>
                                    <td>2024-07-24</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jane Smith</td>
                                    <td>Purchased a product</td>
                                    <td>2024-07-23</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Bob Johnson</td>
                                    <td>Signed up</td>
                                    <td>2024-07-22</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
