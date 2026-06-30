<?php

namespace Database\Seeders;

use App\Models\Workflow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workflows = [];
        for ($i = 1; $i <= 20; $i++) {
            $workflows[] = [
                'user_id' => 1,
                'name' => "Workflow {$i}",
                'description' => "This is the description for workflow {$i}",
                'steps' => json_encode([
                    ['name' => 'Step 1', 'order' => 1, 'action' => 'Initiate process'],
                    ['name' => 'Step 2', 'order' => 2, 'action' => 'Review submission'],
                    ['name' => 'Step 3', 'order' => 3, 'action' => 'Approve or reject'],
                    ['name' => 'Step 4', 'order' => 4, 'action' => 'Finalize workflow']
                ])
            ];
        }
        
        Workflow::insert($workflows);
    }
}
