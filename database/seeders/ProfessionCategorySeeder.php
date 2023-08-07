<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProfessionCategorySeeder extends Seeder
{

    public function run()
    {
        // DB::table('prof_categories')->insert(
            $items = [
                ['created_by_id'=>1, 'id' => 1, 'name' => 'Government Employee'],
                ['created_by_id'=>1, 'id' => 2, 'name' => 'Private Employee'],
                ['created_by_id'=>1, 'id' => 3, 'name' => 'Business/Company/Shop'],
                ['created_by_id'=>1, 'id' => 4, 'name' => 'Farmer/Cheneta'],
                ['created_by_id'=>1, 'id' => 5, 'name' => 'Realestate/Building Contractor'],
                ['created_by_id'=>1, 'id' => 6, 'name' => 'Daily wage Worker/Driver (Shop,Building,Agri etc)'],
                ['created_by_id'=>1, 'id' => 7, 'name' => 'Media/Youtube/Insta Influencer'],
                ['created_by_id'=>1, 'id' => 8, 'name' => 'Freelancer/Self-employed'], 
                ['created_by_id'=>1, 'id' => 9, 'name' => 'Other'],               
                ['created_by_id'=>1, 'id' => 10, 'name' => 'House wife'],
                ['created_by_id'=>1, 'id' => 11, 'name' => 'Student'],
                ['created_by_id'=>1, 'id' => 12, 'name' => 'Retired'],
                ['created_by_id'=>1, 'id' => 13, 'name' => 'Unemployed'],
                ['created_by_id'=>1, 'id' => 14, 'name' => 'Not Applicable'],    
        ];

        foreach ($items as $item) {
            \App\Models\ProfileRelated\ProfessionCategory::create($item);
        };


        $items = [
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Central Administrative Services (IAS, IPS, IFS, IRS, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Central Investigative/Intelligence Agencies'],            
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'State Administrative Services'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'PSU Management Positions (Chairman, Managing Director, Executive Director, General Manager, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'PSU Specialist Roles (Engineers, HR, Finance, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Indian Armed Forces (Army, Navy, Air Force)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Central Armed Police Forces (CRPF, BSF, ITBP, SSB, CISF)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'State Police/Paramilitary Forces'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'State Investigative/Anticorruption Agencies'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'State Transport Services (RTC driver, Conductor etc.)'],     
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Banking and Insurance: Management Positions (Chairman, Managing Director, Executive Director, General Manager, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Banking and Insurance: Specialist Roles (Probationary Officers, Specialist Officers, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Railway Administrative Positions (Chairman & CEO, General Manager, Divisional Railway Manager, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Railway Technical Positions (Engineers, Technicians, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Teaching Positions (Professor, Associate Professor, Assistant Professor, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Research Positions (Scientist, Research Associate, Project Manager, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Judges (Supreme Court, High Court, District Court)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Legal Professionals (Public Prosecutors, Legal Advisers, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Medical Professionals (Doctors, Nurses, Paramedics, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Medical Administrative Positions (Chief Medical Officer, Senior Medical Officer, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Medical Service Other (Nurses, technicians)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Engineering Positions (Civil, Mechanical, Electrical, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Scientific Positions (Research & Development, Project Management, etc.)'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Forest and Environmental Officers'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Wildlife and Conservation Specialists'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Cultural, Tourism, and Sports Officers'],
            ['created_by_id'=>1, 'category_id' => 1, 'name' => 'Event Management and Promotion Specialists'],


            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Information Technology (IT) and Software Services'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Banking, Finance, and Insurance'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Manufacturing and Production'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Healthcare and Pharmaceuticals'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Retail and E-commerce'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Telecommunications'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Education and Research'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Media and Entertainment'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Travel, Tourism, and Hospitality'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Real Estate and Construction'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Logistics and Supply Chain'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Energy and Utilities'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Professional Services (Consulting, Legal, Accounting, etc.)'],
            ['created_by_id'=>1, 'category_id' => 2, 'name' => 'Non-Governmental Organizations (NGOs) and Social Enterprises'],

                
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Retail Business (Grocery, Clothing, Electronics, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Wholesale Business (Distributor, Supplier, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Food and Beverage Business (Restaurant, Cafe, Catering, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Professional Services (Consulting, Legal, Accounting, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Healthcare Services (Clinic, Pharmacy, Diagnostic Center, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Real Estate (Property Management, Brokerage, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Automotive Services (Vehicle Sales, Repair, Spare Parts, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Tourism and Travel Services (Travel Agency, Tour Operator, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Beauty and Personal Care Services (Salon, Spa, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Event Management and Entertainment Services'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Education and Training Services (Tutoring, Coaching, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Agriculture and Agribusiness (Professional Farming, Livestock, etc.)'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Manufacturing and Production'],
            ['created_by_id'=>1, 'category_id' => 3, 'name' => 'Transportation and Logistics Services (Courier, Freight, etc.)'],


            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Crop Farming (Cotton, Mirchi, Cereals, Vegetables, Fruits, etc.)'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Animal Husbandry (Dairy, Poultry, Goat, etc.)'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Fisheries (Marine, Freshwater, Aquaculture)'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Apiculture (Beekeeping)'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Sericulture (Silk Farming)'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Horticulture (Floriculture, Landscaping)'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Organic Farming'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Agroforestry (Tree Farming)'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Handloom Weaving'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Powerloom Weaving'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Knitting and Crochet'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Embroidery and Needlework'],
            ['created_by_id'=>1, 'category_id' => 4, 'name' => 'Traditional Textile Crafts (Block Printing, Batik, etc.)'],


            ['created_by_id'=>1, 'category_id' => 5, 'name' => 'Real Estate Developer'],
            ['created_by_id'=>1, 'category_id' => 5, 'name' => 'Building Contractor'],
            ['created_by_id'=>1, 'category_id' => 5, 'name' => 'Project Manager'],
            ['created_by_id'=>1, 'category_id' => 5, 'name' => 'Site Supervisor'],
            ['created_by_id'=>1, 'category_id' => 5, 'name' => 'Quantity Surveyor'],

            ['created_by_id'=>1, 'category_id' => 6, 'name' => 'Shop Worker'],
            ['created_by_id'=>1, 'category_id' => 6, 'name' => 'Construction Laborer'],
            ['created_by_id'=>1, 'category_id' => 6, 'name' => 'Agricultural Laborer'],
            ['created_by_id'=>1, 'category_id' => 6, 'name' => 'Domestic Helper'],
            ['created_by_id'=>1, 'category_id' => 6, 'name' => 'Driver (Truck, Bus, Taxi, Auto)'],

            ['created_by_id'=>1, 'category_id' => 7, 'name' => 'Journalist'],
            ['created_by_id'=>1, 'category_id' => 7, 'name' => 'TV/Radio Presenter'],
            ['created_by_id'=>1, 'category_id' => 7, 'name' => 'Content Creator (YouTube, Instagram, TikTok, etc.)'],
            ['created_by_id'=>1, 'category_id' => 7, 'name' => 'Social Media Manager'],
            ['created_by_id'=>1, 'category_id' => 7, 'name' => 'Digital Marketer'],

            ['created_by_id'=>1, 'category_id' => 8, 'name' => 'Graphic Designer'],
            ['created_by_id'=>1, 'category_id' => 8, 'name' => 'Web Developer'],
            ['created_by_id'=>1, 'category_id' => 8, 'name' => 'Writer (Content, Copy, Technical)'],
            ['created_by_id'=>1, 'category_id' => 8, 'name' => 'Consultant (Business, Marketing, IT, etc.)'],
            ['created_by_id'=>1, 'category_id' => 8, 'name' => 'Photographer/Videographer'],

            ['created_by_id'=>1, 'category_id' => 9, 'name' => 'Other'],               
            ['created_by_id'=>1, 'category_id' => 10, 'name' => 'House wife'],
            ['created_by_id'=>1, 'category_id' => 11, 'name' => 'Student'],
            ['created_by_id'=>1, 'category_id' => 12, 'name' => 'Retired'],
            ['created_by_id'=>1, 'category_id' => 13, 'name' => 'Unemployed'],
            ['created_by_id'=>1, 'category_id' => 14, 'name' => 'Not Applicable'], 
        ];
        foreach ($items as $item) {
            \App\Models\ProfileRelated\AllProfession::create($item);
        }
    }
}
