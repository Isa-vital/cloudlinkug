<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\HeroSlide;
use App\Models\Page;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProdSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user without factory
        User::create([
            'name' => 'Admin',
            'email' => 'admin@cloudlinkug.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Cl0udL1nk@2026'),
            'remember_token' => Str::random(10),
        ]);

        // Site Settings
        $settings = [
            'site_name' => 'Cloudlink IT Services',
            'tagline' => 'Powering Business Through Smart Technology',
            'phone' => '+256 776 121 422',
            'phone2' => '+256 700 000 000',
            'email' => 'info@cloudlinkug.com',
            'address' => 'Plot 24, Kampala Road, Kampala, Uganda',
            'facebook' => 'https://facebook.com/cloudlinkug',
            'twitter' => 'https://twitter.com/cloudlinkug',
            'instagram' => 'https://instagram.com/cloudlinkug',
            'linkedin' => 'https://linkedin.com/company/cloudlinkug',
            'youtube' => '',
            'whatsapp' => '+256776121422',
            'about_short' => 'Cloudlink IT Services is a leading technology company in Uganda providing end-to-end IT solutions for businesses of all sizes.',
            'footer_text' => 'Cloudlink IT Services — Powering Business Through Smart Technology. Your trusted partner for IT solutions in Uganda and East Africa.',
            'working_hours' => 'Mon – Fri: 8:00 AM – 6:00 PM | Sat: 9:00 AM – 1:00 PM',
            'google_map' => 'https://maps.google.com/?q=Kampala+Road+Kampala+Uganda',
        ];

        foreach ($settings as $key => $value) {
            Setting::create(['key' => $key, 'value' => $value]);
        }

        // Hero Slides
        HeroSlide::create(['title' => 'Smart IT Solutions for Modern Business', 'subtitle' => 'From cloud migration to cybersecurity, we deliver technology that drives growth.', 'button_text' => 'Get Started', 'button_url' => '/contact', 'image' => '', 'sort_order' => 1, 'is_active' => true]);
        HeroSlide::create(['title' => 'Secure. Reliable. Scalable.', 'subtitle' => 'Enterprise-grade IT infrastructure tailored for Ugandan businesses.', 'button_text' => 'Our Services', 'button_url' => '/services', 'image' => '', 'sort_order' => 2, 'is_active' => true]);
        HeroSlide::create(['title' => 'Your Trusted Technology Partner', 'subtitle' => 'Over a decade of experience powering businesses across East Africa.', 'button_text' => 'About Us', 'button_url' => '/about', 'image' => '', 'sort_order' => 3, 'is_active' => true]);

        // Services
        $services = [
            ['name' => 'Custom Software Development', 'slug' => 'custom-software-development', 'excerpt' => 'Tailored software solutions built to solve your unique business challenges.', 'description' => '<p>We design and develop custom software applications that streamline your operations and give you a competitive edge.</p>', 'icon' => 'fa-code', 'image' => '', 'is_featured' => true, 'sort_order' => 1],
            ['name' => 'Networking & Infrastructure', 'slug' => 'networking-infrastructure', 'excerpt' => 'Robust network design, installation, and management for seamless connectivity.', 'description' => '<p>From LAN/WAN setup to enterprise Wi-Fi and network security, we build the backbone your business runs on.</p>', 'icon' => 'fa-network-wired', 'image' => '', 'is_featured' => true, 'sort_order' => 2],
            ['name' => 'Cybersecurity Solutions', 'slug' => 'cybersecurity-solutions', 'excerpt' => 'Protect your business from evolving cyber threats with our comprehensive security services.', 'description' => '<p>We provide vulnerability assessments, penetration testing, SIEM implementation, and employee security training.</p>', 'icon' => 'fa-shield-halved', 'image' => '', 'is_featured' => true, 'sort_order' => 3],
            ['name' => 'Smart Security Solutions', 'slug' => 'smart-security-solutions', 'excerpt' => 'CCTV, access control, and alarm systems for complete premises security.', 'description' => '<p>Professional installation and monitoring of IP cameras, biometric access control, and integrated alarm systems.</p>', 'icon' => 'fa-video', 'image' => '', 'is_featured' => true, 'sort_order' => 4],
            ['name' => 'Cloud Services & Migration', 'slug' => 'cloud-services-migration', 'excerpt' => 'Seamless cloud migration and management for scalable, cost-effective operations.', 'description' => '<p>We help you move to AWS, Azure, or Google Cloud with zero downtime and optimized costs.</p>', 'icon' => 'fa-cloud', 'image' => '', 'is_featured' => true, 'sort_order' => 5],
            ['name' => 'IT Consultancy & Strategy', 'slug' => 'it-consultancy-strategy', 'excerpt' => 'Strategic IT planning and advisory to align technology with your business goals.', 'description' => '<p>Our consultants assess your current IT landscape and create roadmaps for digital transformation.</p>', 'icon' => 'fa-lightbulb', 'image' => '', 'is_featured' => true, 'sort_order' => 6],
            ['name' => 'Hardware Supply & Maintenance', 'slug' => 'hardware-supply-maintenance', 'excerpt' => 'Quality computer hardware, servers, and peripherals with after-sales support.', 'description' => '<p>We supply and maintain desktops, laptops, servers, printers, UPS systems, and more from leading brands.</p>', 'icon' => 'fa-desktop', 'image' => '', 'is_featured' => false, 'sort_order' => 7],
            ['name' => 'Web Design & Development', 'slug' => 'web-design-development', 'excerpt' => 'Beautiful, responsive websites that drive engagement and conversions.', 'description' => '<p>We create modern websites using the latest technologies — from corporate sites to e-commerce platforms.</p>', 'icon' => 'fa-globe', 'image' => '', 'is_featured' => false, 'sort_order' => 8],
            ['name' => 'Data Recovery & Backup', 'slug' => 'data-recovery-backup', 'excerpt' => 'Protect your critical business data with reliable backup and recovery solutions.', 'description' => '<p>We implement automated backup strategies and can recover data from failed drives, corrupted systems, and ransomware attacks.</p>', 'icon' => 'fa-database', 'image' => '', 'is_featured' => false, 'sort_order' => 9],
            ['name' => 'Managed IT Services', 'slug' => 'managed-it-services', 'excerpt' => 'Outsource your IT operations to us for proactive monitoring and support.', 'description' => '<p>24/7 monitoring, helpdesk support, patch management, and regular health checks — all for a predictable monthly fee.</p>', 'icon' => 'fa-headset', 'image' => '', 'is_featured' => false, 'sort_order' => 10],
            ['name' => 'Solar & Power Solutions', 'slug' => 'solar-power-solutions', 'excerpt' => 'Reliable solar energy systems and power backup solutions for uninterrupted operations.', 'description' => '<p>We design and install solar panel systems, inverters, and battery banks for homes and businesses across Uganda.</p>', 'icon' => 'fa-solar-panel', 'image' => '', 'is_featured' => false, 'sort_order' => 11],
            ['name' => 'VoIP & Telephony', 'slug' => 'voip-telephony', 'excerpt' => 'Modern business phone systems that reduce costs and improve communication.', 'description' => '<p>IP PBX installation, SIP trunking, and unified communications platforms for businesses of all sizes.</p>', 'icon' => 'fa-phone-volume', 'image' => '', 'is_featured' => false, 'sort_order' => 12],
            ['name' => 'ERP & Business Systems', 'slug' => 'erp-business-systems', 'excerpt' => 'Integrated enterprise systems to manage your finances, inventory, HR, and more.', 'description' => '<p>Implementation and customization of Odoo, SAP Business One, and custom ERP solutions.</p>', 'icon' => 'fa-cubes', 'image' => '', 'is_featured' => false, 'sort_order' => 13],
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing', 'excerpt' => 'Results-driven digital marketing strategies to grow your online presence.', 'description' => '<p>SEO, social media marketing, Google Ads, and content strategy to drive traffic and generate leads.</p>', 'icon' => 'fa-bullhorn', 'image' => '', 'is_featured' => false, 'sort_order' => 14],
            ['name' => 'ICT Training & Capacity Building', 'slug' => 'ict-training-capacity-building', 'excerpt' => 'Empower your team with practical ICT skills and certification programs.', 'description' => '<p>Customized training programs covering Microsoft Office, cybersecurity awareness, cloud computing, and programming.</p>', 'icon' => 'fa-graduation-cap', 'image' => '', 'is_featured' => false, 'sort_order' => 15],
            ['name' => 'EFRIS Integration & Tax Solutions', 'slug' => 'efris-integration-tax-solutions', 'excerpt' => 'Seamless EFRIS compliance and integration with your existing accounting systems.', 'description' => '<p>We integrate URA EFRIS with Tally, QuickBooks, and custom software so you stay tax-compliant without disruption.</p>', 'icon' => 'fa-file-invoice-dollar', 'image' => '', 'is_featured' => false, 'sort_order' => 16],
        ];

        foreach ($services as $s) {
            Service::create($s);
        }

        // Projects
        $projects = [
            ['title' => 'Kampala Mall CCTV Installation', 'slug' => 'kampala-mall-cctv', 'description' => '64-camera IP surveillance system with AI analytics and remote monitoring.', 'client' => 'Kampala Mall Ltd', 'category' => 'Security', 'image' => '', 'is_featured' => true, 'completed_at' => now()->subMonths(2)],
            ['title' => 'Hotel Munyonyo Cloud Migration', 'slug' => 'hotel-munyonyo-cloud', 'description' => 'Complete migration of hotel management system to Azure cloud.', 'client' => 'Hotel Munyonyo', 'category' => 'Cloud', 'image' => '', 'is_featured' => true, 'completed_at' => now()->subMonths(4)],
            ['title' => 'NWSC Network Infrastructure', 'slug' => 'nwsc-network', 'description' => 'Enterprise WAN deployment connecting 15 regional offices.', 'client' => 'National Water & Sewerage Corporation', 'category' => 'Networking', 'image' => '', 'is_featured' => true, 'completed_at' => now()->subMonths(6)],
            ['title' => 'Stanbic Bank Cybersecurity Audit', 'slug' => 'stanbic-cybersecurity', 'description' => 'Comprehensive penetration testing and security assessment.', 'client' => 'Stanbic Bank Uganda', 'category' => 'Security', 'image' => '', 'is_featured' => true, 'completed_at' => now()->subMonths(3)],
            ['title' => 'MoH Health Information System', 'slug' => 'moh-health-system', 'description' => 'Custom web application for tracking health indicators across districts.', 'client' => 'Ministry of Health Uganda', 'category' => 'Software', 'image' => '', 'is_featured' => false, 'completed_at' => now()->subMonths(8)],
            ['title' => 'Entebbe Hotel Solar Installation', 'slug' => 'entebbe-hotel-solar', 'description' => '50kW solar system reducing electricity costs by 60%.', 'client' => 'Imperial Resort Beach Hotel', 'category' => 'Solar', 'image' => '', 'is_featured' => false, 'completed_at' => now()->subMonths(5)],
            ['title' => 'Roofings ERP Implementation', 'slug' => 'roofings-erp', 'description' => 'Odoo ERP deployment for manufacturing and inventory management.', 'client' => 'Roofings Group', 'category' => 'ERP', 'image' => '', 'is_featured' => false, 'completed_at' => now()->subMonths(7)],
            ['title' => 'Makerere University LAN Upgrade', 'slug' => 'makerere-lan-upgrade', 'description' => 'Campus-wide network upgrade with fibre backbone and managed Wi-Fi.', 'client' => 'Makerere University', 'category' => 'Networking', 'image' => '', 'is_featured' => false, 'completed_at' => now()->subMonths(9)],
        ];

        foreach ($projects as $p) {
            Project::create($p);
        }

        // Testimonials
        $testimonials = [
            ['name' => 'Sarah Namukasa', 'position' => 'Operations Director', 'company' => 'Kampala Mall Ltd', 'content' => 'Cloudlink transformed our security infrastructure. The CCTV system they installed has significantly reduced theft and their support team is always responsive.', 'image' => '', 'rating' => 5, 'is_featured' => true],
            ['name' => 'James Ochieng', 'position' => 'IT Manager', 'company' => 'Stanbic Bank Uganda', 'content' => 'Their cybersecurity audit was thorough and professional. They identified vulnerabilities we had overlooked and provided actionable remediation steps.', 'image' => '', 'rating' => 5, 'is_featured' => true],
            ['name' => 'Patricia Akello', 'position' => 'General Manager', 'company' => 'Hotel Munyonyo', 'content' => 'The cloud migration was seamless. Our hotel management system is now faster and more reliable. Cloudlink made the transition stress-free.', 'image' => '', 'rating' => 5, 'is_featured' => true],
            ['name' => 'David Mugisha', 'position' => 'CEO', 'company' => 'Roofings Group', 'content' => 'Implementing Odoo ERP with Cloudlink was the best decision for our manufacturing operations. Real-time inventory tracking has saved us millions.', 'image' => '', 'rating' => 4, 'is_featured' => true],
            ['name' => 'Grace Atuhaire', 'position' => 'Finance Director', 'company' => 'MedPharm Uganda', 'content' => 'Cloudlink handled our EFRIS integration perfectly. No downtime, no disruption. Their team even trained our accountants on the new workflow.', 'image' => '', 'rating' => 5, 'is_featured' => true],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // Team Members
        $team = [
            ['name' => 'Isaac Mukonyezi', 'position' => 'Founder & CEO', 'bio' => 'Over 12 years of experience in IT solutions and business development across East Africa.', 'image' => '', 'email' => 'isaac@cloudlinkug.com', 'linkedin' => 'https://linkedin.com/in/isaacmukonyezi', 'sort_order' => 1],
            ['name' => 'Faith Among', 'position' => 'Head of Cybersecurity', 'bio' => 'Certified ethical hacker with expertise in vulnerability assessment and incident response.', 'image' => '', 'email' => 'faith@cloudlinkug.com', 'linkedin' => '', 'sort_order' => 2],
            ['name' => 'Dennis Okello', 'position' => 'Lead Developer', 'bio' => 'Full-stack developer specializing in Laravel, React, and cloud-native applications.', 'image' => '', 'email' => 'dennis@cloudlinkug.com', 'linkedin' => '', 'sort_order' => 3],
            ['name' => 'Sarah Namugga', 'position' => 'Network Engineer', 'bio' => 'Cisco-certified network professional with experience in enterprise WAN and data centre design.', 'image' => '', 'email' => 'sarah@cloudlinkug.com', 'linkedin' => '', 'sort_order' => 4],
            ['name' => 'Joseph Kizza', 'position' => 'Solar & Power Lead', 'bio' => 'Electrical engineer specializing in commercial and industrial solar installations.', 'image' => '', 'email' => 'joseph@cloudlinkug.com', 'linkedin' => '', 'sort_order' => 5],
            ['name' => 'Amina Nabirye', 'position' => 'Client Relations Manager', 'bio' => 'Ensuring every Cloudlink client receives exceptional service and support.', 'image' => '', 'email' => 'amina@cloudlinkug.com', 'linkedin' => '', 'sort_order' => 6],
        ];

        foreach ($team as $t) {
            TeamMember::create($t);
        }

        // Pages
        Page::create(['title' => 'Privacy Policy', 'slug' => 'privacy-policy', 'body' => '<h2>Privacy Policy</h2><p>Cloudlink IT Services is committed to protecting your privacy. This policy outlines how we collect, use, and safeguard your information.</p>', 'is_published' => true]);
        Page::create(['title' => 'Terms of Service', 'slug' => 'terms-of-service', 'body' => '<h2>Terms of Service</h2><p>By using the services provided by Cloudlink IT Services, you agree to the following terms and conditions.</p>', 'is_published' => true]);

        // Contact Messages
        ContactMessage::create(['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '+256700000001', 'subject' => 'Need CCTV Installation', 'message' => 'We need a 16-camera system for our warehouse. Please send a quote.', 'is_read' => false]);

        // Blog Posts
        $blogPosts = [
            ['title' => '5 Cybersecurity Threats Every Ugandan Business Should Know in 2025', 'slug' => '5-cybersecurity-threats-every-ugandan-business-should-know-2025', 'excerpt' => 'From phishing attacks to ransomware, learn about the most critical cybersecurity threats facing businesses in Uganda.', 'body' => '<p>Cybersecurity is no longer a luxury — it is a necessity for every business operating in East Africa.</p><h2>1. Phishing Attacks</h2><p>Phishing remains the number one attack vector.</p><h2>2. Ransomware</h2><p>Ransomware attacks encrypt your files and demand payment.</p><h2>3. Business Email Compromise</h2><p>BEC scams target businesses that conduct wire transfers.</p><h2>4. Insider Threats</h2><p>Not all threats come from outside.</p><h2>5. Unpatched Software</h2><p>Running outdated software is like leaving your front door open.</p>', 'category' => 'Security', 'author' => 'Faith Among', 'is_published' => true, 'published_at' => now()->subDays(3)],
            ['title' => 'Why Every Business in Uganda Needs EFRIS Compliance Now', 'slug' => 'why-every-business-uganda-needs-efris-compliance', 'excerpt' => 'URA EFRIS is mandatory. Here is what you need to know and how to get compliant.', 'body' => '<p>The Uganda Revenue Authority has mandated that all VAT-registered businesses use EFRIS.</p><h2>What is EFRIS?</h2><p>EFRIS is an electronic system for real-time transmission of fiscal data to URA.</p>', 'category' => 'Business', 'author' => 'Cloudlink Team', 'is_published' => true, 'published_at' => now()->subDays(7)],
            ['title' => 'How CCTV Surveillance Reduces Business Losses by Up to 70%', 'slug' => 'how-cctv-surveillance-reduces-business-losses', 'excerpt' => 'Learn how modern CCTV systems with AI analytics are helping Ugandan businesses cut theft.', 'body' => '<p>Theft and fraud cost Ugandan businesses billions of shillings every year. Modern CCTV systems are one of the most effective investments in loss prevention.</p>', 'category' => 'Security', 'author' => 'Faith Among', 'is_published' => true, 'published_at' => now()->subDays(12)],
            ['title' => 'Solar Power for Businesses: A Smart Investment', 'slug' => 'solar-power-businesses-smart-investment-uganda', 'excerpt' => 'With rising electricity costs, solar installation is becoming a must-have for Ugandan businesses.', 'body' => '<p>Uganda enjoys abundant sunshine throughout the year, making solar energy one of the most viable power solutions.</p>', 'category' => 'Technology', 'author' => 'Cloudlink Team', 'is_published' => true, 'published_at' => now()->subDays(18)],
            ['title' => '7 Tips for Choosing the Right IT Partner', 'slug' => '7-tips-choosing-right-it-partner-business', 'excerpt' => 'Selecting the right IT provider can make or break your digital transformation.', 'body' => '<p>Your IT partner will have access to your most sensitive systems. Here are seven factors to consider when choosing.</p>', 'category' => 'Tips', 'author' => 'Isaac Mukonyezi', 'is_published' => true, 'published_at' => now()->subDays(25)],
            ['title' => 'The Future of Remote Work: Tools and Infrastructure', 'slug' => 'future-remote-work-tools-infrastructure', 'excerpt' => 'Remote and hybrid work is here to stay. Discover the essential tools your team needs.', 'body' => '<p>The pandemic permanently changed how we work. Remote work requires the right technology infrastructure to be productive and secure.</p>', 'category' => 'Technology', 'author' => 'Dennis Okello', 'is_published' => true, 'published_at' => now()->subDays(30)],
        ];

        foreach ($blogPosts as $post) {
            BlogPost::create($post);
        }

        echo "Production seed complete!\n";
    }
}
