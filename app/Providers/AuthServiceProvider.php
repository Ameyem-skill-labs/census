<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Expense management
        Gate::define('expense_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Expense category
        Gate::define('expense_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Income category
        Gate::define('income_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Income
        Gate::define('income_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('income_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Expense
        Gate::define('expense_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('expense_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Monthly report
        Gate::define('monthly_report_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Currency
        Gate::define('currency_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('currency_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('currency_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('currency_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('currency_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

         // Auth gates for: Office management
         Gate::define('office_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

         // Auth gates for: Attendence
         Gate::define('attendance_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('attendance_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('attendance_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('attendance_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('attendance_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Todays Attendence
        Gate::define('today_attendance_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Add Attendence
        Gate::define('add_attendance_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Search Attendence
        Gate::define('search_attendance_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: List of Attendence
        Gate::define('list_attendance_access', function ($user) {
            return in_array($user->role_id, [1]);
        });


        // Auth gates for: Employees
        Gate::define('census_access', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });
        // Auth gates for: List of Employee
        Gate::define('list_census_access', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });
        // Auth gates for: Add Employee
        Gate::define('add_census_access', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });



        // Auth gates for: Employees
        Gate::define('villages_access', function ($user) {
            return in_array($user->role_id, [1,2,3,4,5]);
        });
        // Auth gates for: List of Employee
        Gate::define('list_villages_access', function ($user) {
            return in_array($user->role_id, [1,2,3,4,5]);
        });
        // Auth gates for: Add Employee
        Gate::define('village_create', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });
        // Auth gates for: Add Employee
        Gate::define('village_edit', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });
        // Auth gates for: Add Employee
        Gate::define('village_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Add Employee
        Gate::define('village_view', function ($user) {
            return in_array($user->role_id, [1,2,3,4,5]);
        });


        
        // Auth gates for: Employees
        Gate::define('person_access', function ($user) {
            return in_array($user->role_id, [1,2,3,4,5]);
        });
        // Auth gates for: List of Employee
        Gate::define('list_person_access', function ($user) {
            return in_array($user->role_id, [1,2,3,4,5]);
        });
        // Auth gates for: Add Employee
        Gate::define('person_create', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });
        // Auth gates for: Add Employee
        Gate::define('person_edit', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });
        // Auth gates for: Add Employee
        Gate::define('person_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Add Employee
        Gate::define('person_view', function ($user) {
            return in_array($user->role_id, [1,2,3,4,5]);
        });



        

        // Auth gates for: Employees
        Gate::define('employee_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: List of Employee
        Gate::define('list_employee_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Add Employee
        Gate::define('add_employee_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
         // Auth gates for: Tasks
         Gate::define('tasks_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: List of Tasks
        Gate::define('list_tasks_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Add Tasks
        Gate::define('add_tasks_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Own Tasks
        Gate::define('own_tasks_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: My Tasks
        Gate::define('my_tasks_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
    }
}
