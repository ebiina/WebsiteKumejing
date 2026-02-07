@extends('layouts.public')

@section('content')
    <!-- Page Header -->
    <section class="relative py-24 text-white bg-village-primary overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/header-bg.jpg') }}" class="w-full h-full object-cover" alt="Header Background">
            <div class="absolute inset-0 bg-village-primary/60"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-5xl font-bold mb-4">Profil Desa</h1>
            <div class="flex justify-center items-center gap-2 text-village-light">
                <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
                <span>/</span>
                <span class="text-white">Profil Desa</span>
            </div>
        </div>
    </section>

<div class="profil-desa-container">

    {{-- Visi Misi Section --}}
    <section class="visi-misi-section reveal">
        <div class="visi-card">
            <div class="card-icon">
                <i class="icon-target"></i>
            </div>
            <h2 class="section-title">Visi Desa Kumejing</h2>
            <p class="visi-text">"Sesarengan Membangun Kumejing Harapan Baru Kumejing Hebat"</p>
        </div>

        <div class="misi-card">
            <div class="card-icon">
                <i class="icon-list"></i>
            </div>
            <h2 class="section-title">Misi Desa Kumejing</h2>
            <ol class="misi-list">
                <li>Mewujudkan pemerintahan desa yang religius.</li>
                <li>Mewujudkan pemerintahan desa yang melayani seluruh masyarakat di empat dusun dengan pelayanan yang mudah, ramah, dan nyaman.</li>
                <li>Mewujudkan pemerintahan desa yang bertanggung jawab, transparan, terbuka, dan bersih.</li>
                <li>Melanjutkan pembangunan prasarana jalan poros desa, jalan antar dusun, jalan lingkungan, serta jalan usaha tani (JUT).</li>
                <li>Membangun sarana dan prasarana perekonomian serta memperkuat kapasitas kepariwisataan dan pertanian masyarakat.</li>
                <li>Menuntaskan pendidikan dasar 12 tahun bagi warga usia sekolah serta menyediakan sarana dan prasarana pendidikan anak usia dini dan pendidikan nonformal.</li>
                <li>Memberikan pelayanan kesehatan kepada masyarakat dengan fasilitas kesehatan yang memadai serta pelayanan yang cepat, ramah, dan mudah.</li>
                <li>Mengelola dan meningkatkan kapasitas sumber daya manusia serta kelembagaan desa.</li>
                <li>Memanfaatkan potensi desa sebagai modal pemberdayaan dan peningkatan kesejahteraan masyarakat.</li>
                <li>Meningkatkan kehidupan masyarakat yang rukun, aman, dan tertib dengan berpegang teguh pada prinsip-prinsip agama dan adat istiadat yang berlaku.</li>
                <li>Membentuk komunitas relawan peduli lingkungan dan tanggap darurat bencana.</li>
            </ol>
        </div>
    </section>

    {{-- Sejarah Desa Section --}}
    <section class="sejarah-section reveal">
        <div class="section-header">
            <h2 class="section-title">Sejarah Desa Kumejing</h2>
            <div class="title-underline"></div>
        </div>

        <div class="sejarah-content">
            <h3 class="subtitle">Asal Usul Nama</h3>
            <p>Awal mula Desa Kumejing berasal dari masa Perang Jawa, saat Belanda menjajah Indonesia. Di tanah Jawa, perlawanan dipimpin oleh Pangeran Diponegoro yang menjadi musuh utama Belanda. Keadaan di kota sangat menakutkan akibat perang. Tidak ada yang tahu tempat mana yang aman atau siapa yang akan menang. Orang-orang hanya takut menjadi korban.</p>

            <p>Akhirnya, banyak yang memutuskan mencari tempat di daerah pelosok yang jauh dari keributan, demi keselamatan dan keberlangsungan hidup. Mereka bersembunyi atau mengungsi di tengah hutan. Setelah sekian lama, mereka menolak kembali ke tempat asal dan terus membuka hutan untuk bertahan hidup.</p>

            <h3 class="subtitle">Lima Tokoh Pembuka Desa</h3>
            <p>Suatu hari, datanglah lima orang ke tempat itu. Kelima orang tersebut akhirnya menjadi pimpinan bagi orang-orang yang ingin bertempat tinggal di sana. Menurut cerita, kelima orang itu memiliki sifat wali, sehingga mereka menjadi pemimpin dalam pembukaan hutan tersebut.</p>

            <p>Pada suatu hari, saat kelima orang itu sedang membuka hutan, mereka menemukan kayu yang sangat aneh dan ajaib. Salah satu dari mereka memberi nama kayu itu sebagai <strong>kayu meying</strong>. Beliau berkata, "Seumpamanya suatu saat di sini menjadi desa, maka nama desa tersebut adalah <strong>Desa Kumejing</strong>."</p>

            <div class="tokoh-list">
                <h4>Kelima Tokoh Pendiri (Umar Amir):</h4>
                <ul>
                    <li>Ja'farsodiq</li>
                    <li>Sayid Sunan Mengkukuan</li>
                    <li>Sayid Payaman/Syarifudin Abduloh</li>
                    <li>Umar Chamid</li>
                    <li>Amir Mahdi</li>
                </ul>
            </div>

            <h3 class="subtitle">Penjelajahan dan Penamaan Wilayah</h3>
            <p>Umar Amir memulai menelusuri hutan dari daerah yang tinggi, yaitu bukit yang mirip seperti gunung. Umar Amir memberi nama bukit tersebut dengan sebutan <strong>Gunung atau Bukit Indrakila</strong>. Di puncak Gunung Indrakila terdapat banyak keajaiban, seperti Tuk Beji Ajaib, pertapaan Arjuna, dan pertapaan lainnya.</p>

            <p>Di puncak Gunung Indrakila juga terdapat batu besar yang diberi nama <strong>Batu Joggo</strong>. Batu tersebut dipercaya sebagai tutup gunung atau dalam bahasa Jawa disebut <em>mempel gunung</em>. Apabila gunung itu tidak memiliki tutup atau sumpel, dipercaya dapat membahayakan orang-orang yang bermukim di bawahnya, yaitu Desa Kumejing.</p>

            <div class="wilayah-bersejarah">
                <h4>Tempat-Tempat Bersejarah yang Dinamai:</h4>
                <div class="tempat-grid">
                    <div class="tempat-item">
                        <strong>Dukuh</strong>
                        <p>Bukit kecil di tengah lereng dengan barang ajaib yang harus dijaga kukuh</p>
                    </div>
                    <div class="tempat-item">
                        <strong>Pasar Sukomulio</strong>
                        <p>Lembah gunung yang menjadi terminal dan pasar</p>
                    </div>
                    <div class="tempat-item">
                        <strong>Wana Sirna</strong>
                        <p>Tempat tinggal raja babi hutan (celeng)</p>
                    </div>
                    <div class="tempat-item">
                        <strong>Alas Sikuncung</strong>
                        <p>Hutan di ketinggian sebelah timur</p>
                    </div>
                    <div class="tempat-item">
                        <strong>Lubang Ewu</strong>
                        <p>Tempat dengan lubang ajaib yang dijaga Kyai Pletuk</p>
                    </div>
                    <div class="tempat-item">
                        <strong>Telaga Melem</strong>
                        <p>Hutan dengan pohon besar berisi telaga jernih dan ikan melem</p>
                    </div>
                    <div class="tempat-item">
                        <strong>Uwug Kidang</strong>
                        <p>Tempat kijang banyak minum di sungai</p>
                    </div>
                    <div class="tempat-item">
                        <strong>Si Bucu</strong>
                        <p>Bukit terlipat dengan ular besar pemberi alamat kemakmuran</p>
                    </div>
                </div>
            </div>

            <h3 class="subtitle">Perkembangan Desa</h3>
            <p>Lama-kelamaan banyak orang yang datang dan bermukim menjadi warga. Mereka berasal dari Bagelen Purworejo, Jogja, Kebumen, Jawa Barat, dan tempat-tempat lain. Hutan pun terbuka luas dan akhirnya menjadi desa yang diberi nama <strong>Desa Kumejing</strong>.</p>

            <p>Setelah menyepakati nama, mereka melakukan musyawarah dan membentuk gerumbul atau beberapa kelompok:</p>
            <ul class="gerumbul-list">
                <li><strong>Gerumbul Pekingan</strong> - di sebelah timur</li>
                <li><strong>Gerumbul Trukareya</strong> - di tengah (dari kata trukak)</li>
                <li><strong>Gerumbul Kedungbulu</strong> - di sebelah barat</li>
                <li><strong>Gerumbul Lawang Sari/Mbrondong</strong> - paling barat</li>
            </ul>
        </div>
    </section>

    {{-- Sejarah Pemerintahan Section --}}
    <section class="pemerintahan-section">
        <div class="section-header">
            <h2 class="section-title">Sejarah Pemerintahan Desa</h2>
            <div class="title-underline"></div>
        </div>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">Sebelum 1921</div>
                    <h4 class="kepala-desa">Kepala Desa: Jaya Dipa</h4>
                    <div class="highlight-box">
                        <p>Kehidupan Desa Kumejing sangat menderita pada zaman penjajahan. Kegiatan masyarakat Desa Kumejing belum berkembang sama sekali.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">1921</div>
                    <h4 class="kepala-desa">Lurah: Jaya Reja</h4>
                    <div class="highlight-box">
                        <ul class="achievement-list">
                            <li>Mulai diadakan sekolah rakyat (SR) sampai kelas 3</li>
                            <li>Kehidupan masyarakat masih sangat menderita</li>
                            <li>Kebudayaan: merenjan tayub dan kuda kepang</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">1933</div>
                    <h4 class="kepala-desa">Lurah: Toro</h4>
                    <div class="highlight-box">
                        <p>Kehidupan masyarakat masih sangat menderita karena sebagian besar menggantungkan hidupnya dari pertanian. Budaya merenjan tayub dan kuda kepang termasuk penghormatan leluhur Desa Kumejing.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">1946–1976</div>
                    <h4 class="kepala-desa">Lurah: Heroni</h4>
                    <div class="highlight-box">
                        <ul class="achievement-list">
                            <li>Keadaan Desa Kumejing mulai membaik</li>
                            <li>Jalan Wadaslintang–Kumejing sudah ada meski kondisinya kurang baik</li>
                            <li>Hasil pertanian mulai berkembang</li>
                            <li>Penerapan peraturan Bimas Inmas, keamanan membaik</li>
                            <li>Pendidikan meningkat dari SR 3 menjadi SR 6</li>
                            <li>Ditambah sekolah Islam MBW (Madrasah Wajib Belajar) sampai kelas IV</li>
                            <li>Budaya: kuda kepang, angguk salawatan, pengajian, penghormatan leluhur</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">1977</div>
                    <h4 class="kepala-desa">Kepala Desa: Sastro Prayitno</h4>
                    <div class="highlight-box">
                        <ul class="achievement-list">
                            <li>Kehidupan rakyat bertambah baik</li>
                            <li>Pendidikan meningkat dengan bantuan Inpres</li>
                            <li>Budaya: kuda kepang, janeng, gambus, arab-araban, pengajian, peringatan hari besar Islam</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">1981–1988</div>
                    <h4 class="kepala-desa">Kepala Desa: Ratmin</h4>
                    <div class="highlight-box">
                        <p><strong>Periode Pembangunan Waduk Kedung Selam</strong></p>
                        <ul class="achievement-list">
                            <li>Masyarakat mengalami guncangan besar</li>
                            <li>40% warga transmigrasi</li>
                            <li>50% pindah dari Desa Kumejing</li>
                            <li>10% tetap bertahan hingga sekarang</li>
                            <li>Ekonomi menurun karena berkurangnya lahan pertanian</li>
                            <li>Banyak warga melakukan urbanisasi ke kota</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">1990–2002</div>
                    <h4 class="kepala-desa">Kepala Desa: Cholidin</h4>
                    <div class="highlight-box">
                        <ul class="achievement-list">
                            <li>Jalan antar dusun Kirangan–Brondong dilebarkan</li>
                            <li>Pembangunan masjid di setiap dukuh</li>
                            <li>Sekolah di setiap dukuh sudah tersedia</li>
                            <li>1999: Jaringan listrik masuk (dengan banyak kendala)</li>
                            <li>Kegiatan keagamaan: yasinan di tiap dukuh, pengajian rutin tiap Minggu Kliwon</li>
                            <li>Kesenian: kuda kepang, rebana, janeng, gambus</li>
                            <li>Pendidikan: program wajib sembilan tahun dimulai</li>
                            <li>Tantangan: kurangnya lahan pertanian, pengangguran meningkat</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">2007</div>
                    <h4 class="kepala-desa">Kepala Desa: Wahyu</h4>
                    <div class="highlight-box">
                        <ul class="achievement-list">
                            <li>Melanjutkan pembangunan infrastruktur</li>
                            <li>Pengembangan fasilitas pendidikan dan keagamaan</li>
                            <li>Kesenian tradisional tetap dilestarikan</li>
                            <li>Menghadapi tantangan pertanian dan pengangguran</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <div class="timeline-period">2009</div>
                    <h4 class="kepala-desa">Kepala Desa: Suratno</h4>
                    <div class="highlight-box">
                        <ul class="achievement-list">
                            <li>Melanjutkan konsolidasi pembangunan desa</li>
                            <li>Penguatan infrastruktur dan fasilitas umum</li>
                            <li>Pemberdayaan masyarakat di berbagai sektor</li>
                            <li>Pelestarian budaya dan nilai-nilai keagamaan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
:root {
    --primary-blue: #053F5C;
    --accent-light: #9FE7F5;
    --accent-medium: #429EBD;
    --accent-orange: #F7AD19;
}

.profil-desa-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

/* Header */
.page-header {
    text-align: center;
    margin-bottom: 3rem;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-blue);
    margin-bottom: 1rem;
}

.breadcrumb {
    color: #718096;
    font-size: 0.95rem;
}

.breadcrumb a {
    color: var(--accent-medium);
    text-decoration: none;
    transition: color 0.3s;
}

.breadcrumb a:hover {
    color: var(--primary-blue);
}

.separator {
    margin: 0 0.5rem;
}

/* Visi Misi Section */
.visi-misi-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.visi-card,
.misi-card {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-medium) 100%);
    color: white;
    padding: 2.5rem;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(5, 63, 92, 0.2);
}

.card-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    opacity: 0.9;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.visi-text {
    font-size: 1.1rem;
    line-height: 1.6;
    font-style: italic;
}

.misi-list {
    list-style: none;
    counter-reset: misi-counter;
    padding-left: 0;
}

.misi-list li {
    counter-increment: misi-counter;
    margin-bottom: 1rem;
    padding-left: 2.5rem;
    position: relative;
    line-height: 1.6;
}

.misi-list li::before {
    content: counter(misi-counter);
    position: absolute;
    left: 0;
    top: 0;
    background: white;
    color: var(--primary-blue);
    width: 1.8rem;
    height: 1.8rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Sejarah Section */
.sejarah-section,
.pemerintahan-section {
    margin-bottom: 4rem;
}

.section-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.section-header .section-title {
    font-size: 2rem;
    color: var(--primary-blue);
    margin-bottom: 0.5rem;
}

.title-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-medium), var(--accent-orange));
    margin: 0 auto;
    border-radius: 2px;
}

.sejarah-content {
    background: white;
    padding: 2.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(5, 63, 92, 0.08);
}

.subtitle {
    font-size: 1.4rem;
    color: var(--primary-blue);
    margin-top: 2rem;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--accent-light);
}

.sejarah-content p {
    line-height: 1.8;
    color: #4a5568;
    margin-bottom: 1.2rem;
    text-align: justify;
}

.tokoh-list {
    background: #f0f9fc;
    padding: 1.5rem;
    border-radius: 8px;
    margin: 1.5rem 0;
    border-left: 4px solid var(--accent-medium);
}

.tokoh-list h4 {
    color: var(--primary-blue);
    margin-bottom: 1rem;
}

.tokoh-list ul {
    list-style: none;
    padding-left: 0;
}

.tokoh-list li {
    padding: 0.5rem 0;
    padding-left: 1.5rem;
    position: relative;
}

.tokoh-list li::before {
    content: "✦";
    position: absolute;
    left: 0;
    color: var(--accent-orange);
}

.wilayah-bersejarah {
    margin: 2rem 0;
}

.wilayah-bersejarah h4 {
    color: var(--primary-blue);
    margin-bottom: 1.5rem;
}

.tempat-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1.5rem;
}

.tempat-item {
    background: linear-gradient(135deg, #f0f9fc 0%, #e6f7fb 100%);
    padding: 1.25rem;
    border-radius: 8px;
    border-left: 3px solid var(--accent-orange);
    transition: transform 0.3s, box-shadow 0.3s;
}

.tempat-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(5, 63, 92, 0.15);
    border-left-color: var(--accent-medium);
}

.tempat-item strong {
    display: block;
    color: var(--primary-blue);
    margin-bottom: 0.5rem;
    font-size: 1.05rem;
}

.tempat-item p {
    margin: 0;
    font-size: 0.9rem;
    color: #718096;
}

.gerumbul-list {
    background: #f0f9fc;
    padding: 1.5rem;
    border-radius: 8px;
    margin: 1.5rem 0;
    border: 1px solid var(--accent-light);
}

.gerumbul-list li {
    padding: 0.75rem 0;
    line-height: 1.6;
    color: #2d3748;
}

.gerumbul-list li strong {
    color: var(--primary-blue);
}

/* Timeline */
.timeline {
    position: relative;
    padding-left: 0;
    margin-top: 3rem;
}

.timeline-item {
    position: relative;
    margin-bottom: 4rem;
    padding-left: 3.5rem;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: 8px; /* Center of marker */
    top: 1.125rem; /* Center of current marker */
    bottom: -5.125rem; /* To center of next marker (margin 4rem + offset 1.125rem) */
    width: 4px;
    background: linear-gradient(180deg, var(--accent-medium), var(--accent-light));
    border-radius: 4px;
    opacity: 0.2;
    z-index: 1;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.timeline-marker {
    position: absolute;
    left: 0;
    top: 0.5rem;
    width: 20px;
    height: 20px;
    background: white;
    border: 4px solid var(--accent-medium);
    border-radius: 50%;
    z-index: 10;
    box-shadow: 0 0 0 4px white;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.timeline-marker.active {
    background: var(--accent-orange);
    border-color: var(--accent-orange);
    box-shadow: 0 0 0 6px rgba(247, 173, 25, 0.15), 0 0 0 4px white;
}

.timeline-item:hover .timeline-marker {
    transform: scale(1.3);
    border-color: var(--accent-orange);
}

.timeline-content {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(5, 63, 92, 0.05);
    border: 1px solid rgba(226, 232, 240, 0.8);
    transition: all 0.4s ease;
    position: relative;
}

.timeline-content:hover {
    transform: translateX(10px);
    box-shadow: 0 15px 35px rgba(5, 63, 92, 0.12);
    border-color: var(--accent-medium);
}

/* Arrow point for the card */
.timeline-content::after {
    content: '';
    position: absolute;
    left: -10px;
    top: 18px;
    width: 20px;
    height: 20px;
    background: white;
    transform: rotate(45deg);
    border-bottom: 1px solid rgba(226, 232, 240, 0.8);
    border-left: 1px solid rgba(226, 232, 240, 0.8);
    z-index: 1;
}

.timeline-period {
    display: inline-block;
    background: linear-gradient(135deg, var(--primary-blue), var(--accent-medium));
    color: white;
    padding: 0.5rem 1.25rem;
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.85rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 10px rgba(5, 63, 92, 0.2);
    position: relative;
    z-index: 2;
}

.kepala-desa {
    color: var(--primary-blue);
    margin-bottom: 1.25rem;
    font-size: 1.35rem;
    font-weight: 800;
    position: relative;
    z-index: 2;
}

.achievement-list {
    list-style: none;
    padding-left: 0;
    position: relative;
    z-index: 2;
}

.achievement-list li {
    padding: 0.6rem 0;
    padding-left: 1.75rem;
    position: relative;
    color: #4a5568;
    line-height: 1.7;
    border-bottom: 1px dashed #edf2f7;
}

.achievement-list li:last-child {
    border-bottom: none;
}

.achievement-list li::before {
    content: "→";
    position: absolute;
    left: 0;
    color: var(--accent-orange);
    font-weight: bold;
}

.highlight-box {
    background: #fff8e6;
    border-left: 4px solid var(--accent-orange);
    padding: 1.25rem;
    border-radius: 8px;
    margin-top: 1.5rem;
    position: relative;
    z-index: 2;
}

.highlight-box.warning {
    background: #fffdf5;
    border-left-color: var(--accent-orange);
}

.highlight-box strong {
    display: block;
    color: var(--primary-blue);
    margin-bottom: 0.75rem;
}

/* Responsive */
@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .visi-misi-section {
        grid-template-columns: 1fr;
    }
    
    .sejarah-content {
        padding: 1.5rem;
    }
    
    .tempat-grid {
        grid-template-columns: 1fr;
    }
    
    .timeline {
        padding-left: 1rem;
    }
    
    .timeline-item {
        padding-left: 1.5rem;
    }
}
</style>
@endsection