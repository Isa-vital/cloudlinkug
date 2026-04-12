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
        HeroSlide::create(['heading' => 'Smart IT Solutions for Modern Business', 'subheading' => 'From cloud migration to cybersecurity, we deliver technology that drives growth.', 'button_text' => 'Get Started', 'button_url' => '/contact', 'image_path' => '', 'display_order' => 1, 'is_active' => true]);
        HeroSlide::create(['heading' => 'Secure. Reliable. Scalable.', 'subheading' => 'Enterprise-grade IT infrastructure tailored for Ugandan businesses.', 'button_text' => 'Our Services', 'button_url' => '/services', 'image_path' => '', 'display_order' => 2, 'is_active' => true]);
        HeroSlide::create(['heading' => 'Your Trusted Technology Partner', 'subheading' => 'Over a decade of experience powering businesses across East Africa.', 'button_text' => 'About Us', 'button_url' => '/about', 'image_path' => '', 'display_order' => 3, 'is_active' => true]);

        // Services (columns: title, slug, description, icon_class, image_path, display_order, is_active)
        $services = [
            ['title' => 'Custom Software Development', 'slug' => 'custom-software-development', 'description' => '<p>Tailored software solutions built to solve your unique business challenges. We design and develop custom applications that streamline your operations.</p>', 'icon_class' => 'fa-code', 'image_path' => '', 'display_order' => 1, 'is_active' => true],
            ['title' => 'Networking & Infrastructure', 'slug' => 'networking-infrastructure', 'description' => '<p>Robust network design, installation, and management. From LAN/WAN setup to enterprise Wi-Fi and network security.</p>', 'icon_class' => 'fa-network-wired', 'image_path' => '', 'display_order' => 2, 'is_active' => true],
            ['title' => 'Cybersecurity Solutions', 'slug' => 'cybersecurity-solutions', 'description' => '<p>Protect your business from evolving cyber threats. We provide vulnerability assessments, penetration testing, and employee security training.</p>', 'icon_class' => 'fa-shield-halved', 'image_path' => '', 'display_order' => 3, 'is_active' => true],
            ['title' => 'Smart Security Solutions', 'slug' => 'smart-security-solutions', 'description' => '<p>CCTV, access control, and alarm systems. Professional installation and monitoring of IP cameras and biometric access control.</p>', 'icon_class' => 'fa-video', 'image_path' => '', 'display_order' => 4, 'is_active' => true],
            ['title' => 'Cloud Services & Migration', 'slug' => 'cloud-services-migration', 'description' => '<p>Seamless cloud migration and management. We help you move to AWS, Azure, or Google Cloud with zero downtime.</p>', 'icon_class' => 'fa-cloud', 'image_path' => '', 'display_order' => 5, 'is_active' => true],
            ['title' => 'IT Consultancy & Strategy', 'slug' => 'it-consultancy-strategy', 'description' => '<p>Strategic IT planning and advisory to align technology with your business goals and create roadmaps for digital transformation.</p>', 'icon_class' => 'fa-lightbulb', 'image_path' => '', 'display_order' => 6, 'is_active' => true],
            ['title' => 'Hardware Supply & Maintenance', 'slug' => 'hardware-supply-maintenance', 'description' => '<p>Quality computer hardware, servers, and peripherals with after-sales support from leading brands.</p>', 'icon_class' => 'fa-desktop', 'image_path' => '', 'display_order' => 7, 'is_active' => true],
            ['title' => 'Web Design & Development', 'slug' => 'web-design-development', 'description' => '<p>Beautiful, responsive websites using the latest technologies — from corporate sites to e-commerce platforms.</p>', 'icon_class' => 'fa-globe', 'image_path' => '', 'display_order' => 8, 'is_active' => true],
            ['title' => 'Data Recovery & Backup', 'slug' => 'data-recovery-backup', 'description' => '<p>Reliable backup and recovery solutions. We recover data from failed drives, corrupted systems, and ransomware attacks.</p>', 'icon_class' => 'fa-database', 'image_path' => '', 'display_order' => 9, 'is_active' => true],
            ['title' => 'Managed IT Services', 'slug' => 'managed-it-services', 'description' => '<p>24/7 monitoring, helpdesk support, patch management, and regular health checks — all for a predictable monthly fee.</p>', 'icon_class' => 'fa-headset', 'image_path' => '', 'display_order' => 10, 'is_active' => true],
            ['title' => 'Solar & Power Solutions', 'slug' => 'solar-power-solutions', 'description' => '<p>Solar panel systems, inverters, and battery banks for homes and businesses across Uganda.</p>', 'icon_class' => 'fa-solar-panel', 'image_path' => '', 'display_order' => 11, 'is_active' => true],
            ['title' => 'VoIP & Telephony', 'slug' => 'voip-telephony', 'description' => '<p>IP PBX installation, SIP trunking, and unified communications platforms for businesses of all sizes.</p>', 'icon_class' => 'fa-phone-volume', 'image_path' => '', 'display_order' => 12, 'is_active' => true],
            ['title' => 'ERP & Business Systems', 'slug' => 'erp-business-systems', 'description' => '<p>Implementation and customization of Odoo, SAP Business One, and custom ERP solutions.</p>', 'icon_class' => 'fa-cubes', 'image_path' => '', 'display_order' => 13, 'is_active' => true],
            ['title' => 'Digital Marketing', 'slug' => 'digital-marketing', 'description' => '<p>SEO, social media marketing, Google Ads, and content strategy to drive traffic and generate leads.</p>', 'icon_class' => 'fa-bullhorn', 'image_path' => '', 'display_order' => 14, 'is_active' => true],
            ['title' => 'ICT Training & Capacity Building', 'slug' => 'ict-training-capacity-building', 'description' => '<p>Customized training programs covering Microsoft Office, cybersecurity awareness, cloud computing, and programming.</p>', 'icon_class' => 'fa-graduation-cap', 'image_path' => '', 'display_order' => 15, 'is_active' => true],
            ['title' => 'EFRIS Integration & Tax Solutions', 'slug' => 'efris-integration-tax-solutions', 'description' => '<p>We integrate URA EFRIS with Tally, QuickBooks, and custom software so you stay tax-compliant without disruption.</p>', 'icon_class' => 'fa-file-invoice-dollar', 'image_path' => '', 'display_order' => 16, 'is_active' => true],
        ];

        foreach ($services as $s) {
            Service::create($s);
        }

        // Projects (columns: title, slug, description, category, image_path, is_active)
        $projects = [
            ['title' => 'Kampala Mall CCTV Installation', 'slug' => 'kampala-mall-cctv', 'description' => '64-camera IP surveillance system with AI analytics and remote monitoring for Kampala Mall Ltd.', 'category' => 'Security', 'image_path' => '', 'is_active' => true],
            ['title' => 'Hotel Munyonyo Cloud Migration', 'slug' => 'hotel-munyonyo-cloud', 'description' => 'Complete migration of hotel management system to Azure cloud for Hotel Munyonyo.', 'category' => 'Cloud', 'image_path' => '', 'is_active' => true],
            ['title' => 'NWSC Network Infrastructure', 'slug' => 'nwsc-network', 'description' => 'Enterprise WAN deployment connecting 15 regional offices for National Water & Sewerage Corporation.', 'category' => 'Networking', 'image_path' => '', 'is_active' => true],
            ['title' => 'Stanbic Bank Cybersecurity Audit', 'slug' => 'stanbic-cybersecurity', 'description' => 'Comprehensive penetration testing and security assessment for Stanbic Bank Uganda.', 'category' => 'Security', 'image_path' => '', 'is_active' => true],
            ['title' => 'MoH Health Information System', 'slug' => 'moh-health-system', 'description' => 'Custom web application for tracking health indicators across districts for Ministry of Health Uganda.', 'category' => 'Software', 'image_path' => '', 'is_active' => true],
            ['title' => 'Entebbe Hotel Solar Installation', 'slug' => 'entebbe-hotel-solar', 'description' => '50kW solar system reducing electricity costs by 60% for Imperial Resort Beach Hotel.', 'category' => 'Solar', 'image_path' => '', 'is_active' => true],
            ['title' => 'Roofings ERP Implementation', 'slug' => 'roofings-erp', 'description' => 'Odoo ERP deployment for manufacturing and inventory management for Roofings Group.', 'category' => 'ERP', 'image_path' => '', 'is_active' => true],
            ['title' => 'Makerere University LAN Upgrade', 'slug' => 'makerere-lan-upgrade', 'description' => 'Campus-wide network upgrade with fibre backbone and managed Wi-Fi for Makerere University.', 'category' => 'Networking', 'image_path' => '', 'is_active' => true],
        ];

        foreach ($projects as $p) {
            Project::create($p);
        }

        // Testimonials (columns: client_name, company, message, rating, avatar_path, is_active)
        $testimonials = [
            ['client_name' => 'Sarah Namukasa', 'company' => 'Kampala Mall Ltd', 'message' => 'Cloudlink transformed our security infrastructure. The CCTV system they installed has significantly reduced theft and their support team is always responsive.', 'rating' => 5, 'avatar_path' => '', 'is_active' => true],
            ['client_name' => 'James Ochieng', 'company' => 'Stanbic Bank Uganda', 'message' => 'Their cybersecurity audit was thorough and professional. They identified vulnerabilities we had overlooked and provided actionable remediation steps.', 'rating' => 5, 'avatar_path' => '', 'is_active' => true],
            ['client_name' => 'Patricia Akello', 'company' => 'Hotel Munyonyo', 'message' => 'The cloud migration was seamless. Our hotel management system is now faster and more reliable. Cloudlink made the transition stress-free.', 'rating' => 5, 'avatar_path' => '', 'is_active' => true],
            ['client_name' => 'David Mugisha', 'company' => 'Roofings Group', 'message' => 'Implementing Odoo ERP with Cloudlink was the best decision for our manufacturing operations. Real-time inventory tracking has saved us millions.', 'rating' => 4, 'avatar_path' => '', 'is_active' => true],
            ['client_name' => 'Grace Atuhaire', 'company' => 'MedPharm Uganda', 'message' => 'Cloudlink handled our EFRIS integration perfectly. No downtime, no disruption. Their team even trained our accountants on the new workflow.', 'rating' => 5, 'avatar_path' => '', 'is_active' => true],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // Team Members (columns: name, role, bio, photo_path, display_order, is_active)
        $team = [
            ['name' => 'Isaac Mukonyezi', 'role' => 'Founder & CEO', 'bio' => 'Over 12 years of experience in IT solutions and business development across East Africa.', 'photo_path' => '', 'display_order' => 1, 'is_active' => true],
            ['name' => 'Faith Among', 'role' => 'Head of Cybersecurity', 'bio' => 'Certified ethical hacker with expertise in vulnerability assessment and incident response.', 'photo_path' => '', 'display_order' => 2, 'is_active' => true],
            ['name' => 'Dennis Okello', 'role' => 'Lead Developer', 'bio' => 'Full-stack developer specializing in Laravel, React, and cloud-native applications.', 'photo_path' => '', 'display_order' => 3, 'is_active' => true],
            ['name' => 'Sarah Namugga', 'role' => 'Network Engineer', 'bio' => 'Cisco-certified network professional with experience in enterprise WAN and data centre design.', 'photo_path' => '', 'display_order' => 4, 'is_active' => true],
            ['name' => 'Joseph Kizza', 'role' => 'Solar & Power Lead', 'bio' => 'Electrical engineer specializing in commercial and industrial solar installations.', 'photo_path' => '', 'display_order' => 5, 'is_active' => true],
            ['name' => 'Amina Nabirye', 'role' => 'Client Relations Manager', 'bio' => 'Ensuring every Cloudlink client receives exceptional service and support.', 'photo_path' => '', 'display_order' => 6, 'is_active' => true],
        ];

        foreach ($team as $t) {
            TeamMember::create($t);
        }

        // Pages (columns: title, slug, content, meta_description, is_active)
        Page::create(['title' => 'Privacy Policy', 'slug' => 'privacy-policy', 'content' => '<h2>Privacy Policy</h2><p>Cloudlink IT Services is committed to protecting your privacy. This policy outlines how we collect, use, and safeguard your information.</p>', 'meta_description' => 'Privacy policy for Cloudlink IT Services', 'is_active' => true]);
        Page::create(['title' => 'Terms of Service', 'slug' => 'terms-of-service', 'content' => '<h2>Terms of Service</h2><p>By using the services provided by Cloudlink IT Services, you agree to the following terms and conditions.</p>', 'meta_description' => 'Terms of service for Cloudlink IT Services', 'is_active' => true]);

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
