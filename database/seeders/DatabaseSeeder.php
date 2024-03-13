<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AboutsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoriesDescriptionTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(ContactsDescriptionTableSeeder::class);
        $this->call(FooterGridOnesTableSeeder::class);
        $this->call(FooterGridOnesDescriptionTableSeeder::class);
        $this->call(FooterGridThreesTableSeeder::class);
        $this->call(FooterGridThreesDescriptionTableSeeder::class);
        $this->call(FooterGridTwosTableSeeder::class);
        $this->call(FooterGridTwosDescriptionTableSeeder::class);
        $this->call(FooterInfosTableSeeder::class);
        $this->call(FooterInfosDescriptionTableSeeder::class);
        $this->call(FooterTitlesTableSeeder::class);
        $this->call(HomeSectionSettingsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(NewsDescriptionTableSeeder::class);
        $this->call(ReceiveMailsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SocialCountsTableSeeder::class);
        $this->call(SocialCountsDescriptionTableSeeder::class);
        $this->call(SocialLinksTableSeeder::class);
        $this->call(SubscribersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(NewsTagsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
    }
}
