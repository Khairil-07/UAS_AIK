<?php

namespace Database\Seeders;

use App\Models\Bacaan;
use App\Models\Gerakan;
use App\Models\Mode;
use Illuminate\Database\Seeder;


class BacaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            // Takbiratul Ihram
            [
                'gerakan' => 'Takbiratul Ihram',
                'judul' => 'Takbiratul Ihram',
                'urutan' => 1,
                'teks_arab' => 'اللَّهُ أَكْبَرُ',
                'teks_latin' => 'Allaahu Akbar',
                'terjemahan' => 'Allah Maha Besar.',
                'audio_url' => 'audio/arab/takbiratul_ihram.mp3',
                'audio_indonesia' => 'audio/indonesia/takbiratul_ihram_indo.mp3',
                'sumber' => 'H.R. Bukhari no. 735, Muslim no. 391 — HPT Muhammadiyah',
            ],

            // Berdiri
            // Doa Iftitah
            [
                'gerakan' => 'Berdiri',
                'judul' => 'Doa Iftitah',
                'urutan' => 1,
                'teks_arab' => 'اللَّهُمَّ بَاعِدْ بَيْنِي وَبَيْنَ خَطَايَايَ كَمَا بَاعَدْتَ بَيْنَ الْمَشْرِقِ وَالْمَغْرِبِ، اللَّهُمَّ نَقِّنِي مِنَ الْخَطَايَا كَمَا يُنَقَّى الثَّوْبُ الْأَبْيَضُ مِنَ الدَّنَسِ، اللَّهُمَّ اغْسِلْنِي مِنْ خَطَايَايَ بِالْمَاءِ وَالثَّلْجِ وَالْبَرَدِ',
                'teks_latin' => "Allaahumma baa'id bainii wa baina khotoyaaya kamaa baa'adta bainal masyriqi wal maghrib. Allaahumma naqqinii minal khotoyaa kamaa yunaqqots tsaubu al-abyadu minad danas. Allaahummaghsilnii min khotoyaaya bil maa'i wats tsalji wal barad.",
                'terjemahan' => 'Ya Allah, jauhkanlah antara aku dan kesalahan-kesalahanku, sebagaimana Engkau menjauhkan antara timur dan barat. Ya Allah, bersihkanlah aku dari kesalahan-kesalahanku sebagaimana pakaian putih dibersihkan dari kotoran. Ya Allah, cucilah aku dari kesalahan-kesalahanku dengan air, salju, dan embun beku.',
                'audio_url' => 'audio/arab/doa_iftitah.mp3',
                'audio_indonesia' => 'audio/indonesia/doa_iftitah_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            [
                'gerakan' => 'Berdiri',
                'judul' => 'Surah Al-Fatihah',
                'urutan' => 2,
                'teks_arab' => "بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ\nالْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ\nالرَّحْمَٰنِ الرَّحِيمِ\nمَالِكِ يَوْمِ الدِّينِ\nإِيَّاكَ نَعْبُدُ وَإِيَّاكَ نَسْتَعِينُ\nاهْدِنَا الصِّرَاطَ الْمُسْتَقِيمَ\nصِرَاطَ الَّذِينَ أَنْعَمْتَ عَلَيْهِمْ غَيْرِالْمَغْضُوبِ عَلَيْهِمْ وَلَا الضَّالِّينَ",
                'teks_latin' => "Bismillahir-Rahmanir-Rahim. Alhamdu lillahi Rabbil 'alamin. Ar-Rahmanir-Rahim. Maliki yawmid-din. Iyyaka na'budu wa iyyaka nasta'in. Ihdinas-siratal-mustaqim. Siratal-ladhina an'amta 'alaihim ghayril-maghdubi 'alaihim wa lad-dallin.",
                'terjemahan' => 'Dengan nama Allah Yang Maha Pengasih, Maha Penyayang. Segala puji bagi Allah, Tuhan semesta alam. Maha Pengasih, Maha Penyayang. Penguasa hari pembalasan. Hanya kepada-Mu kami menyembah dan hanya kepada-Mu kami mohon pertolongan. Tunjukilah kami jalan yang lurus, yaitu jalan orang-orang yang Engkau beri nikmat; bukan jalan mereka yang dimurkai dan bukan pula jalan mereka yang sesat.',
                'audio_url' => 'audio/arab/surah_al_fatihah.mp3',
                'audio_indonesia' => 'audio/indonesia/surah_al_fatihah_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            [
                'gerakan' => 'Berdiri',
                'judul' => 'Surah Al-Ikhlas',
                'urutan' => 3,
                'teks_arab' => "قُلْ هُوَ اللَّهُ أَحَدٌ\nاللَّهُ الصَّمَدُ\nلَمْ يَلِدْ وَلَمْ يُولَدْ\nوَلَمْ يَكُن لَّهُ كُفُوًا أَحَدٌ",
                'teks_latin' => "Qul huwa Allahu ahad. Allahus-samad. Lam yalid walam yulad. Walam yakun lahu kufuwan ahad.",
                'terjemahan' => 'Katakanlah: Dialah Allah, Yang Maha Esa. Allah tempat meminta segala sesuatu. (Allah) tidak beranak dan tidak pula diperanakkan. Dan tidak ada sesuatu yang setara dengan Dia.',
                'audio_url' => 'audio/arab/surah_al_ikhlas.mp3',
                'audio_indonesia' => 'audio/indonesia/surah_al_ikhlas_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // Ruku'
            [
                'gerakan' => "Ruku'",
                'judul' => "Doa Ruku'",
                'urutan' => 1,
                'teks_arab' => 'سُبْحَانَكَ اللّهم رَبَّنَا وَبِحَمْدِكَ اللّهم اغْفِرْلِيْ',
                'teks_latin' => 'Subhaanakallaahumma rabbanaa wabihamdika Allaahummagh firlii',
                'terjemahan' => 'Artinya: Maha Suci Engkau, ya Allah. Dan dengan memuji Engkau, ya Allah, aku memohon ampun.',
                'audio_url' => 'audio/arab/doa_ruku.mp3',
                'audio_indonesia' => 'audio/indonesia/doa_ruku_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // I'tidal
            [
                'gerakan' => "I'tidal",
                'judul' => "Doa I'tidal",
                'urutan' => 1,
                'teks_arab' => "سَمِعَ اللَّهُ لِمَنْ حَمِدَهُ\nرَبَّنَا وَلَكَ الْحَمْدُ",
                'teks_latin' => "Sami'a Allahu liman hamidah. Rabbana wa laka al-hamd.",
                'terjemahan' => 'Allah mendengar orang yang memuji-Nya. Wahai Tuhan kami, bagi-Mu segala puji.',
                'audio_url' => 'audio/arab/doa_itidal.mp3',
                'audio_indonesia' => 'audio/indonesia/doa_itidal_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // Sujud Pertama
            [
                'gerakan' => 'Sujud Pertama',
                'judul' => 'Doa Sujud',
                'urutan' => 1,
                'teks_arab' => 'سُبْحَانَكَ اللهُمَّ رَبَّنَا وَبِحَمْدِكَ اللهُمَّ اغْفِرْلِيْ',
                'teks_latin' => 'Subhaanakallah humma rabbanaa wa bihamdikallahummaghfirlii',
                'terjemahan' => 'Maha suci Engkau, Ya Allah, dan dengan memuji kepada Engkau, Ya Allah, aku memohon ampun',
                'audio_url' => 'audio/arab/doa_sujud.mp3',
                'audio_indonesia' => 'audio/indonesia/doa_sujud_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // Duduk
            [
                'gerakan' => 'Duduk di Antara Dua Sujud',
                'judul' => 'Doa Duduk di Antara Dua Sujud',
                'urutan' => 1,
                'teks_arab' => 'اَللّهُمَ اغْفِرْلِيْ وارْحَمنِيْ وَاجْبُرْنِيْ وَاهْدِنِيْ وَارْزُقْنِيْ',
                'teks_latin' => 'Allaahummaghfirlii warhamnii wajburnii wahdinii warzuqnii',
                'terjemahan' => 'Ya Allah, ampunilah aku, belas kasihanilah aku, cukupilah aku, tunjukilah aku dan berikanlah rezeki kepadaku.',
                'audio_url' => 'audio/arab/doa_duduk_antara_dua_sujud.mp3',
                'audio_indonesia' => 'audio/indonesia/doa_duduk_antara_dua_sujud_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // Sujud Kedua
            [
                'gerakan' => 'Sujud Kedua',
                'judul' => 'Doa Sujud',
                'urutan' => 1,
                'teks_arab' => 'سُبْحَانَكَ اللهُمَّ رَبَّنَا وَبِحَمْدِكَ اللهُمَّ اغْفِرْلِيْ',
                'teks_latin' => 'Subhaanakallah humma rabbanaa wa bihamdikallahummaghfirlii',
                'terjemahan' => 'Maha suci Engkau, Ya Allah, dan dengan memuji kepada Engkau, Ya Allah, aku memohon ampun',
                'audio_url' => 'audio/arab/doa_sujud.mp3',
                'audio_indonesia' => 'audio/indonesia/doa_sujud_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // Tasyahud Awal

            [
                'gerakan' => 'Tasyahud Awal',
                'judul' => 'Bacaan Tasyahud Awal',
                'urutan' => 1,
                'teks_arab' => "التحيات لله والصلوات والطيبات\nالسلام عليك أيها النبي ورحمة الله وبركاته\nالسلام علينا وعلى عباد الله الصالحين\nأشهد أن لا إله إلا الله وأشهد أن محمدًا عبده ورسوله",
                'teks_latin' => "At-tahiyyatu lillahi was-salawatu wat-tayyibatu. As-salamu 'alaika ayyuhan-nabiyyu wa rahmatullahi wa barakatuh. As-salamu 'alaina wa 'ala 'ibadillahis-salihin. Ashhadu alla ilaha illallah wa ashhadu anna Muhammadan 'abduhu wa rasuluh.",
                'terjemahan' => 'Segala penghormatan, doa, dan kebaikan hanya bagi Allah. Salam sejahtera atasmu wahai Nabi beserta rahmat dan berkah Allah. Salam atas kami dan atas hamba-hamba Allah yang saleh. Aku bersaksi bahwa tiada Tuhan selain Allah dan aku bersaksi bahwa Muhammad adalah hamba dan utusan-Nya.',
                'audio_url' => 'audio/arab/bacaan_tasyahud_awal.mp3',
                'audio_indonesia' => 'audio/indonesia/bacaan_tasyahud_awal_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // Tasyahud Akhir
            // 1. Bacaan Tasyahud Akhir
            [
                'gerakan' => 'Tasyahud Akhir',
                'judul' => 'Bacaan Tasyahud Akhir',
                'urutan' => 1,
                'teks_arab' => "اَلتَّحِيَّاتُ لِلّٰهِ وَالصَّلَوَاتُ وَالطَّيِّبَاتُ، اَلسَّلَامُ عَلَيْكَ أَيُّهَا النَّبِيُّ وَرَحْمَةُ اللّٰهِ وَبَرَكَاتُهُ، اَلسَّلَامُ عَلَيْنَا وَعَلَى عِبَادِ اللّٰهِ الصَّالِحِينَ، أَشْهَدُ أَنْ لَا إِلٰهَ إِلَّا اللّٰهُ وَأَشْهَدُ أَنَّ مُحَمَّدًا عَبْدُهُ وَرَسُولُهُ",
                'teks_latin' => "Attahiyyaatu lillaahi washsholawaatu waththoyyibaat. Assalaamu 'alaika ayyuhannabiyyu warahmatullaahi wabarakaatuh. Assalaamu 'alainaa wa 'alaa 'ibaadillaahish shaalihiin. Asyhadu an laa ilaaha illallaah wa asyhadu anna Muhammadan 'abduhu wa rasuuluh.",
                'terjemahan' => "Segala kehormatan, doa dan kebaikan adalah milik Allah. Semoga keselamatan, rahmat dan keberkahan Allah tercurah kepadamu wahai Nabi. Semoga keselamatan tercurah pula kepada kami dan kepada hamba-hamba Allah yang saleh. Aku bersaksi bahwa tiada Tuhan selain Allah dan aku bersaksi bahwa Muhammad adalah hamba dan utusan-Nya.",
                'audio_url' => 'audio/arab/bacaan_tasyahud_akhir.mp3',
                'audio_indonesia' => 'audio/indonesia/bacaan_tasyahud_akhir_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // 2. Shalawat Nabi
            [
                'gerakan' => 'Tasyahud Akhir',
                'judul' => 'Shalawat Nabi',
                'urutan' => 2,
                'teks_arab' => "اللّٰهُمَّ صَلِّ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ كَمَا صَلَّيْتَ عَلَى إِبْرَاهِيمَ وَعَلَى آلِ إِبْرَاهِيمَ إِنَّكَ حَمِيدٌ مَجِيدٌ، اللّٰهُمَّ بَارِكْ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ كَمَا بَارَكْتَ عَلَى إِبْرَاهِيمَ وَعَلَى آلِ إِبْرَاهِيمَ إِنَّكَ حَمِيدٌ مَجِيدٌ",
                'teks_latin' => "Allahumma shalli 'alaa Muhammad wa 'alaa aali Muhammad kamaa shallaita 'alaa Ibraahiim wa 'alaa aali Ibraahiim innaka hamiidum majiid. Allahumma baarik 'alaa Muhammad wa 'alaa aali Muhammad kamaa baarakta 'alaa Ibraahiim wa 'alaa aali Ibraahiim innaka hamiidum majiid.",
                'terjemahan' => "Ya Allah, limpahkanlah rahmat kepada Muhammad dan keluarga Muhammad sebagaimana Engkau telah melimpahkan rahmat kepada Ibrahim dan keluarga Ibrahim. Sesungguhnya Engkau Maha Terpuji lagi Maha Mulia. Ya Allah, limpahkanlah keberkahan kepada Muhammad dan keluarga Muhammad sebagaimana Engkau telah melimpahkan keberkahan kepada Ibrahim dan keluarga Ibrahim. Sesungguhnya Engkau Maha Terpuji lagi Maha Mulia.",
                'audio_url' => 'audio/arab/shalawat_nabi.mp3',
                'audio_indonesia' => 'audio/indonesia/shalawat_nabi_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // 3. Doa Perlindungan
            [
                'gerakan' => 'Tasyahud Akhir',
                'judul' => 'Doa Perlindungan',
                'urutan' => 3,
                'teks_arab' => "اَللّٰهُمَّ إِنِّي أَعُوذُ بِكَ مِنْ عَذَابِ جَهَنَّمَ وَمِنْ عَذَابِ الْقَبْرِ وَمِنْ فِتْنَةِ الْمَحْيَا وَالْمَمَاتِ وَمِنْ شَرِّ فِتْنَةِ الْمَسِيحِ الدَّجَّالِ",
                'teks_latin' => "Allaahumma innii a'uudzu bika min 'adzaabi jahannam wa min 'adzaabil qabr wa min fitnatil mahyaa wal mamaat wa min syarri fitnatil masiihid dajjaal.",
                'terjemahan' => "Ya Allah, sesungguhnya aku berlindung kepada-Mu dari azab Jahannam, dari azab kubur, dari fitnah kehidupan dan kematian, serta dari keburukan fitnah Al-Masih Ad-Dajjal.",
                'audio_url' => 'audio/arab/doa_perlindungan.mp3',
                'audio_indonesia' => 'audio/indonesia/doa_perlindungan_indo.mp3',
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],

            // Salam
            [
                'gerakan' => 'Salam',
                'judul' => 'Salam',
                'urutan' => 1,
                'teks_arab' => 'السَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللَّهِ',
                'teks_latin' => "As-salamu 'alaikum wa rahmatullahi",
                'terjemahan' => 'Semoga keselamatan dan rahmat Allah tercurah atas kalian.',
                'audio_url' => 'audio/arab/salam.mp3',
                'audio_indonesia' => 'audio/indonesia/salam_indo.mp3',  
                'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (HPT)',
            ],
        ];

                $modes = Mode::with('gerakans')->get();

        foreach ($modes as $mode) {

            foreach ($data as $item) {

                $gerakan = $mode->gerakans
                    ->where('nama_gerakan', $item['gerakan'])
                    ->first();

                if (!$gerakan) {
                    continue;
                }

                Bacaan::create([
                    'gerakan_id' => $gerakan->id,
                    'judul' => $item['judul'],
                    'urutan' => $item['urutan'],
                    'teks_arab' => $item['teks_arab'],
                    'teks_latin' => $item['teks_latin'],
                    'terjemahan' => $item['terjemahan'],
                    'audio_url' => $item['audio_url'],
                    'audio_indonesia' => $item['audio_indonesia'],
                    'sumber' => $item['sumber'],
                ]);
            }

        }
    }
    
}