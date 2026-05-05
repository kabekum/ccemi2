<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
  public function run()
  {
    $permissions = [

      ['name' => 'create-members', 'display_name' => 'Create Members', 'description' => 'Create Members'],
      ['name' => 'read-members', 'display_name' => 'Read Members', 'description' => 'Read Members'],
      ['name' => 'update-members', 'display_name' => 'Update Members', 'description' => 'Update Members'],

      ['name' => 'create-events', 'display_name' => 'Create Events', 'description' => 'Create Events'],
      ['name' => 'read-events', 'display_name' => 'Read Events', 'description' => 'Read Events'],
      ['name' => 'update-events', 'display_name' => 'Update Events', 'description' => 'Update Events'],

      ['name' => 'create-files', 'display_name' => 'Create Files', 'description' => 'Create Files'],
      ['name' => 'read-files', 'display_name' => 'Read Files', 'description' => 'Read Files'],
      ['name' => 'view-files', 'display_name' => 'View Files', 'description' => 'View Files'],

      ['name' => 'create-bulletins', 'display_name' => 'Create Bulletins', 'description' => 'Create Bulletins'],
      ['name' => 'read-bulletins', 'display_name' => 'Read Bulletins', 'description' => 'Read Bulletins'],
      ['name' => 'view-bulletins', 'display_name' => 'View Bulletins', 'description' => 'View Bulletins'],

      ['name' => 'create-gallery', 'display_name' => 'Create Gallery', 'description' => 'Create Gallery'],
      ['name' => 'read-gallery', 'display_name' => 'Read Gallery', 'description' => 'Read Gallery'],
      ['name' => 'update-gallery', 'display_name' => 'Update Gallery', 'description' => 'Update Gallery'],

      ['name' => 'create-groups', 'display_name' => 'Create Groups', 'description' => 'Create Groups'],
      ['name' => 'read-groups', 'display_name' => 'Read Groups', 'description' => 'Read Groups'],
      ['name' => 'update-groups', 'display_name' => 'Update Groups', 'description' => 'Update Groups'],
      ['name' => 'delete-groups', 'display_name' => 'Delete Groups', 'description' => 'Delete Groups'],

      ['name' => 'create-videos', 'display_name' => 'Create Videos', 'description' => 'Create Videos'],
      ['name' => 'read-videos', 'display_name' => 'Read Videos', 'description' => 'Read Videos'],
      ['name' => 'view-videos', 'display_name' => 'View Videos', 'description' => 'View Videos'],

      ['name' => 'create-funds', 'display_name' => 'Create Funds', 'description' => 'Create Funds'],
      ['name' => 'read-funds', 'display_name' => 'Read Funds', 'description' => 'Read Funds'],
      ['name' => 'update-funds', 'display_name' => 'Update Funds', 'description' => 'Update Funds'],
      ['name' => 'view-funds', 'display_name' => 'View Funds', 'description' => 'View Funds'],

      ['name' => 'create-quotes', 'display_name' => 'Create Quotes', 'description' => 'Create Quotes'],
      ['name' => 'read-quotes', 'display_name' => 'Read Quotes', 'description' => 'Read Quotes'],
      ['name' => 'update-quotes', 'display_name' => 'Update Quotes', 'description' => 'Update Quotes'],

      ['name' => 'create-preachers', 'display_name' => 'Create Preachers', 'description' => 'Create Preachers'],
      ['name' => 'read-preachers', 'display_name' => 'Read Preachers', 'description' => 'Read Preachers'],
      ['name' => 'update-preachers', 'display_name' => 'Update Preachers', 'description' => 'Update Preachers'],

      ['name' => 'read-reports', 'display_name' => 'Read Reports', 'description' => 'Read Reports'],
      ['name' => 'view-reports', 'display_name' => 'View Reports', 'description' => 'View Reports'],

      ['name' => 'read-payments', 'display_name' => 'Read Payments', 'description' => 'Read Payments'],
      ['name' => 'create-payments', 'display_name' => 'Create Payments', 'description' => 'Create Payments'],

      ['name' => 'create-sermons', 'display_name' => 'Create Sermons', 'description' => 'Create Sermons'],
      ['name' => 'read-sermons', 'display_name' => 'Read Sermons', 'description' => 'Read Sermons'],
      ['name' => 'update-sermons', 'display_name' => 'Update Sermons', 'description' => 'Update Sermons'],
      ['name' => 'delete-sermons', 'display_name' => 'Delete Sermons', 'description' => 'Delete Sermons'],

      ['name' => 'read-prayers', 'display_name' => 'Read Prayers', 'description' => 'View prayer board'],
      ['name' => 'update-prayers', 'display_name' => 'Update Prayers', 'description' => 'Moderate prayers'],

      ['name' => 'read-helps', 'display_name' => 'Read Help Requests', 'description' => 'View help requests'],
      ['name' => 'update-helps', 'display_name' => 'Update Help Requests', 'description' => 'Respond to help requests'],

      ['name' => 'read-contacts', 'display_name' => 'Read Contacts', 'description' => 'View contact submissions'],

      ['name' => 'read-feedbacks', 'display_name' => 'Read Feedbacks', 'description' => 'View feedback'],
      ['name' => 'update-feedbacks', 'display_name' => 'Update Feedbacks', 'description' => 'Update feedback status'],

      ['name' => 'read-video-conferences', 'display_name' => 'Read Video Conferences', 'description' => 'View video rooms'],
      ['name' => 'create-video-conferences', 'display_name' => 'Create Video Conferences', 'description' => 'Manage video rooms'],
      ['name' => 'delete-video-conferences', 'display_name' => 'Delete Video Conferences', 'description' => 'Delete video rooms'],

      ['name' => 'manage-email-blaster', 'display_name' => 'Manage Email Blaster', 'description' => 'Full access email system'],
      ['name' => 'manage-cms', 'display_name' => 'Manage CMS', 'description' => 'Full CMS access'],
    ];

    foreach ($permissions as $permission) {
      DB::table('permissions')->updateOrInsert(
        ['name' => $permission['name']],
        $permission
      );
    }
  }
}
