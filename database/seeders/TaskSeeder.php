<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 10 tasks with this week's due dates (current week example: 2026-10-07 to 2026-10-13)
        Task::create([
            'user_id' => 1,
            'task' => 'Complete project requirements gathering',
            'description' => 'Collect and document all stakeholder requirements for the new project',
            'status' => 'To Do',
            'priority' => 'High',
            'due_date' => '2026-06-08',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Set up development environment',
            'description' => 'Configure local development environment with necessary tools and dependencies',
            'status' => 'In Progress',
            'priority' => 'High',
            'due_date' => '2026-06-09',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Create database schema',
            'description' => 'Design and implement initial database structure',
            'status' => 'To Do',
            'priority' => 'High',
            'due_date' => '2026-06-10',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Build user authentication system',
            'description' => 'Implement login, registration and password reset features',
            'status' => 'To Do',
            'priority' => 'High',
            'due_date' => '2026-06-11',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Design homepage layout',
            'description' => 'Create responsive homepage design using Tailwind CSS',
            'status' => 'In Progress',
            'priority' => 'Medium',
            'due_date' => '2026-06-12',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Develop dashboard interface',
            'description' => 'Build admin dashboard with analytics and user management',
            'status' => 'To Do',
            'priority' => 'Medium',
            'due_date' => '2026-06-13',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Write API documentation',
            'description' => 'Document all REST API endpoints with examples',
            'status' => 'To Do',
            'priority' => 'Medium',
            'due_date' => '2026-06-07',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Implement payment gateway',
            'description' => 'Integrate Stripe payment processing for subscriptions',
            'status' => 'To Do',
            'priority' => 'High',
            'due_date' => '2026-06-08',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Create email templates',
            'description' => 'Design and code all system email templates',
            'status' => 'To Do',
            'priority' => 'Low',
            'due_date' => '2026-06-09',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Perform security audit',
            'description' => 'Review codebase for potential security vulnerabilities',
            'status' => 'To Do',
            'priority' => 'High',
            'due_date' => '2026-06-10',
        ]);

        // 10 remaining tasks with last week's due dates (last week example: 2026-09-30 to 2026-10-06)
        Task::create([
            'user_id' => 1,
            'task' => 'Optimize database queries',
            'description' => 'Identify and fix slow database queries',
            'status' => 'To Do',
            'priority' => 'Medium',
            'due_date' => '2026-06-20',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Implement search functionality',
            'description' => 'Add full-text search for content and users',
            'status' => 'To Do',
            'priority' => 'Medium',
            'due_date' => '2026-06-21',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Create mobile responsive views',
            'description' => 'Ensure all pages work properly on mobile devices',
            'status' => 'In Progress',
            'priority' => 'High',
            'due_date' => '2026-06-22',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Set up CI/CD pipeline',
            'description' => 'Configure automated testing and deployment',
            'status' => 'Completed',
            'priority' => 'Medium',
            'due_date' => '2026-06-23',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Write unit tests',
            'description' => 'Create PHPUnit tests for all core functionality',
            'status' => 'Review',
            'priority' => 'Medium',
            'due_date' => '2026-06-24',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Implement file upload feature',
            'description' => 'Add support for uploading and managing user files',
            'status' => 'To Do',
            'priority' => 'Low',
            'due_date' => '2026-06-25',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Add notification system',
            'description' => 'Build in-app and push notification system',
            'status' => 'To Do',
            'priority' => 'Medium',
            'due_date' => '2026-06-26',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Create admin user roles',
            'description' => 'Implement role-based access control system',
            'status' => 'In Progress',
            'priority' => 'High',
            'due_date' => '2026-06-27',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Performance optimization',
            'description' => 'Improve page load times and overall application performance',
            'status' => 'To Do',
            'priority' => 'Medium',
            'due_date' => '2026-06-28',
        ]);
        Task::create([
            'user_id' => 1,
            'task' => 'Launch preparation',
            'description' => 'Complete all pre-launch checks and prepare for production deployment',
            'status' => 'To Do',
            'priority' => 'High',
            'due_date' => '2026-06-29',
        ]);
    }
}
