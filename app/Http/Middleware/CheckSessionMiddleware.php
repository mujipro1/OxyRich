<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckSessionMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Session::get('admin')) {
            if ($this->isAdminRoute($request)) {
                return $next($request);
            } else {
                return redirect()->route('access-denied');
            }
        } elseif (Session::get('customer')) {
            if ($this->isCustomerRoute($request)) {
                return $next($request);
            } else {
                return redirect()->route('access-denied');
            }
        } elseif (Session::get('employee')) {
            if ($this->isEmployeeRoute($request)) {
                return $next($request);
            } else {
                return redirect()->route('access-denied');
            }
        }
        return redirect()->route('login');
    }

    private function isAdminRoute($request)
    {
        $adminRoutes = [
            'admin',
            'CustomerList',
            'deactivateCustomer',
            'activateCustomer',
            'adminAuth',
            'customerEdit',
            'saveCustomerChanges',
            'viewOrderDetails',
            'orderDetails',
            'AddNewCustomer',
            'submitNewCustomer'
        ];

        return in_array($request->route()->getName(), $adminRoutes);
    }

    private function isCustomerRoute($request)
    {
        $customerRoutes = [
            'customer',
        ];

        return in_array($request->route()->getName(), $customerRoutes);
    }

    private function isEmployeeRoute($request)
    {
        // Add logic to determine if the current request is an employee route

        $employeeRoutes = [
            'employee',
            'submitSector',
            'placeOrder',
            'sectors',
            'returnToSector',
            'submitOrder',
            'bottleDetails'
        ];

        return in_array($request->route()->getName(), $employeeRoutes);
    }
}
