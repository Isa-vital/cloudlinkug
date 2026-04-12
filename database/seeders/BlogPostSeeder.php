<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $blogPosts = [
            [
                'title' => '5 Cybersecurity Threats Every Ugandan Business Should Know in 2025',
                'slug' => '5-cybersecurity-threats-every-ugandan-business-should-know-2025',
                'excerpt' => 'From phishing attacks to ransomware, learn about the most critical cybersecurity threats facing businesses in Uganda and how to protect your organization.',
                'body' => '<p>Cybersecurity is no longer a luxury — it is a necessity for every business operating in East Africa. As digital transformation accelerates across Uganda, so do the risks. Here are the top five threats you need to watch out for in 2025.</p><h2>1. Phishing Attacks</h2><p>Phishing remains the number one attack vector. Cybercriminals send deceptive emails that appear to come from trusted sources — banks, government agencies, or even colleagues — to trick employees into revealing passwords or clicking malicious links.</p><h2>2. Ransomware</h2><p>Ransomware attacks encrypt your files and demand payment for the decryption key. In 2024, several East African companies lost weeks of productivity to ransomware incidents. Regular backups and endpoint protection are your best defence.</p><h2>3. Business Email Compromise (BEC)</h2><p>BEC scams target businesses that conduct wire transfers or have suppliers abroad. Attackers impersonate executives or vendors to redirect payments to fraudulent accounts.</p><h2>4. Insider Threats</h2><p>Not all threats come from outside. Disgruntled employees or careless staff can expose sensitive data. Implementing access controls and monitoring user activity helps mitigate this risk.</p><h2>5. Unpatched Software</h2><p>Running outdated software with known vulnerabilities is like leaving your front door open. Ensure all systems are regularly updated and patched.</p><h3>How Cloudlink Can Help</h3><p>At Cloudlink IT Services, we offer comprehensive cybersecurity assessments, employee training, and managed security solutions tailored for Ugandan businesses. <a href="/contact">Contact us</a> today for a free security consultation.</p>',
                'category' => 'Security',
                'author' => 'Faith Among',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Why Every Business in Uganda Needs EFRIS Compliance Now',
                'slug' => 'why-every-business-uganda-needs-efris-compliance',
                'excerpt' => 'URA\'s Electronic Fiscal Receipting and Invoicing System (EFRIS) is mandatory. Here\'s what you need to know and how to get compliant without disrupting your operations.',
                'body' => '<p>The Uganda Revenue Authority (URA) has mandated that all VAT-registered businesses use the Electronic Fiscal Receipting and Invoicing System (EFRIS). Non-compliance can result in penalties, fines, and even business closure.</p><h2>What is EFRIS?</h2><p>EFRIS is an electronic system that enables real-time transmission of fiscal data (invoices, receipts, and credit/debit notes) to URA. It ensures transparency in tax collection and reduces the tax gap.</p><h2>Who Needs to Comply?</h2><p>All VAT-registered taxpayers in Uganda are required to use EFRIS for issuing tax invoices and fiscal receipts. This includes retailers, wholesalers, manufacturers, and service providers.</p><h2>Benefits of EFRIS Compliance</h2><ul><li>Avoid penalties and fines from URA</li><li>Streamlined tax filing and reconciliation</li><li>Improved record-keeping and audit readiness</li><li>Enhanced customer trust with proper receipts</li></ul><h2>Getting Started</h2><p>Cloudlink IT Services specializes in EFRIS integration with popular accounting software including Tally, QuickBooks, and custom ERP systems. We handle the entire setup process from registration to go-live, with full staff training included.</p><p><a href="/contact">Contact us</a> for a free EFRIS readiness assessment.</p>',
                'category' => 'Business',
                'author' => 'Cloudlink Team',
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'How CCTV Surveillance Reduces Business Losses by Up to 70%',
                'slug' => 'how-cctv-surveillance-reduces-business-losses',
                'excerpt' => 'Learn how modern CCTV systems with AI-powered analytics are helping Ugandan businesses cut theft, improve staff accountability, and boost overall security.',
                'body' => '<p>Theft, vandalism, and employee fraud cost Ugandan businesses billions of shillings every year. Modern CCTV surveillance systems are proving to be one of the most effective investments in loss prevention.</p><h2>The Numbers Don\'t Lie</h2><p>Studies show that businesses with professionally installed CCTV systems experience up to 70% reduction in theft-related losses. Beyond deterrence, modern cameras with AI analytics can detect suspicious behaviour in real-time and alert security teams instantly.</p><h2>Key Features of Modern CCTV Systems</h2><ul><li><strong>4K Ultra HD Resolution</strong> — Crystal-clear footage that holds up as evidence</li><li><strong>Night Vision</strong> — 24/7 monitoring regardless of lighting conditions</li><li><strong>AI Motion Detection</strong> — Smart alerts that reduce false alarms</li><li><strong>Remote Viewing</strong> — Monitor your premises from your phone, anywhere in the world</li><li><strong>Cloud Backup</strong> — Secure footage storage that can\'t be tampered with on-site</li></ul><h2>Case Study: Kampala Mall</h2><p>Cloudlink recently completed a 64-camera installation at Kampala Mall. Within the first three months, the mall reported a 65% decrease in shoplifting incidents and significantly improved tenant satisfaction.</p><p>Ready to secure your business? <a href="/services/smart-security-solutions">Explore our security solutions</a> or <a href="/contact">request a free site survey</a>.</p>',
                'category' => 'Security',
                'author' => 'Faith Among',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Solar Power for Businesses: A Smart Investment in Uganda\'s Energy Future',
                'slug' => 'solar-power-businesses-smart-investment-uganda',
                'excerpt' => 'With rising electricity costs and frequent power outages, solar installation is becoming a must-have for Ugandan businesses. Here\'s what you need to know.',
                'body' => '<p>Uganda enjoys abundant sunshine throughout the year, making solar energy one of the most viable and cost-effective power solutions for businesses. With UMEME tariffs rising and load-shedding still a reality in many areas, solar power offers independence and savings.</p><h2>Why Go Solar?</h2><ul><li><strong>Reduce electricity bills by 40-70%</strong> depending on system size</li><li><strong>Uninterrupted power</strong> with battery backup systems</li><li><strong>Low maintenance costs</strong> — panels last 25+ years</li><li><strong>Eco-friendly</strong> — reduce your carbon footprint</li><li><strong>Government incentives</strong> — tax benefits for renewable energy adoption</li></ul><h2>What Size System Do You Need?</h2><p>System sizing depends on your energy consumption. A typical office with 10-15 computers, lighting, and air conditioning might need a 10-20kW system. Larger operations like hotels, factories, or warehouses may require 50kW or more.</p><h2>Our Approach</h2><p>At Cloudlink, we handle everything — from initial energy audit and system design to installation and maintenance. Our recent installation at a 120-room hotel in Entebbe reduced their electricity costs by 60%.</p><p><a href="/contact">Request a free solar energy assessment</a> for your business.</p>',
                'category' => 'Technology',
                'author' => 'Cloudlink Team',
                'is_published' => true,
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => '7 Tips for Choosing the Right IT Partner for Your Business',
                'slug' => '7-tips-choosing-right-it-partner-business',
                'excerpt' => 'Selecting the right IT services provider can make or break your digital transformation. Here are 7 practical tips to help you choose wisely.',
                'body' => '<p>Your IT partner will have access to your most sensitive systems and data. Choosing the right one is a critical business decision. Here are seven factors to consider.</p><h2>1. Experience in Your Industry</h2><p>Look for a provider that understands your sector\'s unique challenges. An IT company that has worked with similar businesses will deliver faster, more relevant solutions.</p><h2>2. Local Presence and Support</h2><p>On-site support matters. When systems go down, you need a team that can be at your location quickly — not one managing your systems remotely from another continent.</p><h2>3. Comprehensive Service Offering</h2><p>Choose a partner that can handle everything from networking and security to software development and cloud migration. This avoids the complexity of managing multiple vendors.</p><h2>4. Proven Track Record</h2><p>Ask for case studies, client references, and portfolio examples. A reputable IT company will be happy to showcase their work.</p><h2>5. Scalability</h2><p>Your IT needs will grow. Ensure your partner can scale services up as your business expands without requiring a complete overhaul.</p><h2>6. Security First Approach</h2><p>In an era of increasing cyber threats, your IT partner should prioritize security in every solution they deliver.</p><h2>7. Transparent Pricing</h2><p>Avoid providers with hidden fees. The best IT partners offer clear, upfront pricing and flexible engagement models.</p><h3>Why Cloudlink?</h3><p>Cloudlink IT Services ticks all these boxes. With over a decade of experience serving businesses across Uganda, a full suite of IT solutions, and a commitment to transparent, quality service — we\'re the partner you can trust. <a href="/contact">Let\'s talk</a>.</p>',
                'category' => 'Tips',
                'author' => 'Isaac Mukonyezi',
                'is_published' => true,
                'published_at' => now()->subDays(25),
            ],
            [
                'title' => 'The Future of Remote Work: Tools and Infrastructure You Need',
                'slug' => 'future-remote-work-tools-infrastructure',
                'excerpt' => 'Remote and hybrid work is here to stay. Discover the essential tools, network setup, and security measures your team needs to work productively from anywhere.',
                'body' => '<p>The pandemic permanently changed how we work. Even as offices reopen, many Ugandan businesses are adopting hybrid work models. But remote work requires the right technology infrastructure to be productive and secure.</p><h2>Essential Tools for Remote Teams</h2><ul><li><strong>Video Conferencing</strong> — Zoom, Microsoft Teams, or Google Meet for daily standups and client meetings</li><li><strong>Project Management</strong> — Tools like Trello, Asana, or Monday.com to track tasks and deadlines</li><li><strong>Cloud Storage</strong> — Google Drive, OneDrive, or Dropbox for file sharing and collaboration</li><li><strong>Communication</strong> — Slack or Microsoft Teams for instant messaging and channels</li><li><strong>VPN</strong> — Secure remote access to company resources</li></ul><h2>Network Requirements</h2><p>Remote workers need reliable internet connectivity. Consider providing portable WiFi devices or data allowances. For critical operations, a backup internet connection is essential.</p><h2>Security Considerations</h2><p>Remote work expands your attack surface. Implement:</p><ul><li>Multi-factor authentication (MFA) on all accounts</li><li>VPN for accessing company systems</li><li>Endpoint security on all devices</li><li>Regular security awareness training</li><li>Mobile device management (MDM) policies</li></ul><p>Cloudlink helps businesses set up complete remote work infrastructure — from VPN configuration and cloud migration to video conferencing setup and security hardening. <a href="/contact">Get in touch</a> to modernize your workplace.</p>',
                'category' => 'Technology',
                'author' => 'Dennis Okello',
                'is_published' => true,
                'published_at' => now()->subDays(30),
            ],
        ];

        foreach ($blogPosts as $post) {
            BlogPost::create($post);
        }
    }
}
