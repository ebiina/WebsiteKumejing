@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="dashboard-container">
    <!-- Welcome Header -->
    <div class="welcome-banner">
        <div class="welcome-content">
            <div class="welcome-icon">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="welcome-text">
                <h1 class="welcome-title">Selamat Datang, {{ auth()->user()->name }}!</h1>
                <p class="welcome-subtitle">Panel kontrol untuk mengelola seluruh informasi dan data Desa Kumejing dengan efisien</p>
            </div>
        </div>
        <div class="welcome-decoration">
            <div class="decoration-circle circle-1"></div>
            <div class="decoration-circle circle-2"></div>
            <div class="decoration-circle circle-3"></div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon-wrapper icon-blue">
                <svg class="stat-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 20H5C3.89543 20 3 19.1046 3 18V6C3 4.89543 3.89543 4 5 4H19C20.1046 4 21 4.89543 21 6V18C21 19.1046 20.1046 20 19 20Z" stroke="currentColor" stroke-width="2"/>
                    <path d="M3 8H21" stroke="currentColor" stroke-width="2"/>
                    <path d="M7 12H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <path d="M7 16H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Berita</div>
                <div class="stat-value">{{ $stats['total_posts'] }}</div>
                <div class="stat-trend trend-up">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 9L6 5L10 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span>Aktif</span>
                </div>
            </div>
        </div>

        <div class="stat-card stat-success">
            <div class="stat-icon-wrapper icon-teal">
                <svg class="stat-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                    <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Perangkat Desa</div>
                <div class="stat-value">{{ $stats['total_officials'] }}</div>
                <div class="stat-trend trend-up">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 9L6 5L10 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span>Lengkap</span>
                </div>
            </div>
        </div>

        <div class="stat-card stat-info">
            <div class="stat-icon-wrapper icon-sky">
                <svg class="stat-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                    <path d="M9 3V21" stroke="currentColor" stroke-width="2"/>
                    <path d="M3 9H9" stroke="currentColor" stroke-width="2"/>
                    <path d="M3 15H9" stroke="currentColor" stroke-width="2"/>
                    <circle cx="15.5" cy="13.5" r="2.5" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Galeri Foto</div>
                <div class="stat-value">{{ $stats['total_galleries'] }}</div>
                <div class="stat-trend trend-up">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 9L6 5L10 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span>Terbaru</span>
                </div>
            </div>
        </div>

        <div class="stat-card stat-warning">
            <div class="stat-icon-wrapper icon-orange">
                <svg class="stat-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 15C21 15.5304 20.7893 16.0391 20.4142 16.4142C20.0391 16.7893 19.5304 17 19 17H7L3 21V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="12" cy="10" r="1" fill="currentColor"/>
                    <circle cx="16" cy="10" r="1" fill="currentColor"/>
                    <circle cx="8" cy="10" r="1" fill="currentColor"/>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Aspirasi Baru</div>
                <div class="stat-value">{{ $stats['total_aspirations'] }}</div>
                <div class="stat-trend trend-neutral">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <circle cx="6" cy="6" r="2" fill="currentColor"/>
                    </svg>
                    <span>Perlu Review</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid">
        <!-- Population Statistics -->
        <div class="content-section population-section">
            <div class="section-header">
                <div class="section-title-wrapper">
                    <h2 class="section-title">Statistik Kependudukan</h2>
                    <p class="section-subtitle">Data demografi terkini Desa Kumejing</p>
                </div>
                <a href="{{ route('admin.stats.index') }}" class="section-link">
                    Kelola Data
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="section-content">
                <div class="population-grid">
                    @foreach($stats['population_stats'] as $stat)
                    <div class="population-card">
                        <div class="population-header">
                            <span class="population-category">{{ $stat->category }}</span>
                        </div>
                        <div class="population-label">{{ $stat->label }}</div>
                        <div class="population-count">{{ number_format($stat->count) }}</div>
                        <div class="population-bar">
                            <div class="population-progress" style="width: {{ ($stat->count / $stats['population_stats']->max('count')) * 100 }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="content-section quick-actions-section">
            <div class="section-header">
                <div class="section-title-wrapper">
                    <h2 class="section-title">Aksi Cepat</h2>
                    <p class="section-subtitle">Kelola konten dengan cepat</p>
                </div>
            </div>
            <div class="section-content">
                <div class="quick-actions-list">
                    <a href="{{ route('admin.posts.create', ['type' => 'news']) }}" class="action-item">
                        <div class="action-icon-wrapper">
                            <svg class="action-icon" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="action-content">
                            <div class="action-title">Buat Berita Baru</div>
                            <div class="action-description">Publikasikan informasi terkini</div>
                        </div>
                        <div class="action-arrow">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M7 14L13 8M13 8H7M13 8V14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>

                    <a href="{{ route('admin.posts.create', ['type' => 'agenda']) }}" class="action-item">
                        <div class="action-icon-wrapper">
                            <svg class="action-icon" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="action-content">
                            <div class="action-title">Tambah Agenda</div>
                            <div class="action-description">Jadwalkan kegiatan desa</div>
                        </div>
                        <div class="action-arrow">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M7 14L13 8M13 8H7M13 8V14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>

                    <a href="{{ route('admin.galleries.create') }}" class="action-item">
                        <div class="action-icon-wrapper">
                            <svg class="action-icon" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5" fill="currentColor"/>
                                <path d="M21 15L16 10L5 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="action-content">
                            <div class="action-title">Unggah Foto Galeri</div>
                            <div class="action-description">Dokumentasi kegiatan desa</div>
                        </div>
                        <div class="action-arrow">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M7 14L13 8M13 8H7M13 8V14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>

                    <a href="{{ route('admin.aspirations.index') }}" class="action-item">
                        <div class="action-icon-wrapper">
                            <svg class="action-icon" viewBox="0 0 24 24" fill="none">
                                <path d="M7 8H17M7 12H13M21 15C21 15.5304 20.7893 16.0391 20.4142 16.4142C20.0391 16.7893 19.5304 17 19 17H7L3 21V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="action-content">
                            <div class="action-title">Lihat Aspirasi</div>
                            <div class="action-description">Cek pesan & saran warga</div>
                        </div>
                        <div class="action-arrow">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M7 14L13 8M13 8H7M13 8V14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary-blue: #053F5C;
    --accent-light: #9FE7F5;
    --accent-medium: #429EBD;
    --accent-orange: #F7AD19;
    --bg-light: #F8FCFD;
    --text-dark: #1a202c;
    --text-muted: #64748b;
}

.dashboard-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
}

/* Welcome Banner */
.welcome-banner {
    position: relative;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-medium) 100%);
    border-radius: 24px;
    padding: 3rem;
    margin-bottom: 2.5rem;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(5, 63, 92, 0.2);
}

.welcome-content {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 2rem;
}

.welcome-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.welcome-icon svg {
    width: 40px;
    height: 40px;
    color: white;
}

.welcome-text {
    flex: 1;
}

.welcome-title {
    font-size: 2rem;
    font-weight: 700;
    color: white;
    margin-bottom: 0.5rem;
    letter-spacing: -0.02em;
}

.welcome-subtitle {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.85);
    line-height: 1.6;
    max-width: 600px;
}

.welcome-decoration {
    position: absolute;
    right: -50px;
    top: -50px;
    z-index: 1;
}

.decoration-circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
}

.circle-1 {
    width: 200px;
    height: 200px;
    top: 0;
    right: 0;
}

.circle-2 {
    width: 150px;
    height: 150px;
    top: 100px;
    right: 150px;
    background: rgba(255, 255, 255, 0.05);
}

.circle-3 {
    width: 100px;
    height: 100px;
    top: 50px;
    right: 250px;
    background: rgba(247, 173, 25, 0.2);
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

.stat-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    box-shadow: 0 4px 20px rgba(5, 63, 92, 0.06);
    border: 1px solid rgba(5, 63, 92, 0.08);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-blue), var(--accent-medium));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(5, 63, 92, 0.12);
}

.stat-card:hover::before {
    transform: scaleX(1);
}

.stat-icon-wrapper {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: relative;
}

.icon-blue {
    background: linear-gradient(135deg, rgba(5, 63, 92, 0.1), rgba(66, 158, 189, 0.1));
    color: var(--primary-blue);
}

.icon-teal {
    background: linear-gradient(135deg, rgba(66, 158, 189, 0.1), rgba(159, 231, 245, 0.15));
    color: var(--accent-medium);
}

.icon-sky {
    background: linear-gradient(135deg, rgba(159, 231, 245, 0.15), rgba(159, 231, 245, 0.25));
    color: var(--accent-medium);
}

.icon-orange {
    background: linear-gradient(135deg, rgba(247, 173, 25, 0.1), rgba(247, 173, 25, 0.2));
    color: var(--accent-orange);
}

.stat-icon {
    width: 28px;
    height: 28px;
}

.stat-content {
    flex: 1;
}

.stat-label {
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--text-muted);
    margin-bottom: 0.5rem;
}

.stat-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-blue);
    line-height: 1;
    margin-bottom: 0.75rem;
}

.stat-trend {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 0.35rem 0.75rem;
    border-radius: 8px;
}

.trend-up {
    background: rgba(66, 158, 189, 0.1);
    color: var(--accent-medium);
}

.trend-neutral {
    background: rgba(247, 173, 25, 0.1);
    color: var(--accent-orange);
}

/* Content Grid */
.content-grid {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 2rem;
}

.content-section {
    background: white;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(5, 63, 92, 0.06);
    border: 1px solid rgba(5, 63, 92, 0.08);
    overflow: hidden;
}

.section-header {
    padding: 2rem 2rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid rgba(5, 63, 92, 0.08);
}

.section-title-wrapper {
    flex: 1;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-blue);
    margin-bottom: 0.25rem;
    letter-spacing: -0.02em;
}

.section-subtitle {
    font-size: 0.875rem;
    color: var(--text-muted);
}

.section-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--accent-medium);
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 10px;
    transition: all 0.3s;
}

.section-link:hover {
    background: rgba(66, 158, 189, 0.1);
    color: var(--primary-blue);
}

.section-link svg {
    transition: transform 0.3s;
}

.section-link:hover svg {
    transform: translateX(3px);
}

.section-content {
    padding: 2rem;
}

/* Population Grid */
.population-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 1.25rem;
}

.population-card {
    background: linear-gradient(135deg, #f8fcfd 0%, #f0f9fc 100%);
    border: 1px solid rgba(66, 158, 189, 0.15);
    border-radius: 16px;
    padding: 1.5rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.population-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(5, 63, 92, 0.1);
    border-color: var(--accent-medium);
}

.population-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0.75rem;
}

.population-category {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--accent-medium);
    background: rgba(66, 158, 189, 0.1);
    padding: 0.25rem 0.65rem;
    border-radius: 6px;
}

.population-badge {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-orange);
}

.population-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.population-count {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--primary-blue);
    margin-bottom: 0.75rem;
}

.population-bar {
    height: 6px;
    background: rgba(66, 158, 189, 0.15);
    border-radius: 3px;
    overflow: hidden;
}

.population-progress {
    height: 100%;
    background: linear-gradient(90deg, var(--accent-medium), var(--accent-light));
    border-radius: 3px;
    transition: width 1s ease-out;
}

/* Quick Actions */
.quick-actions-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.action-item {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    padding: 1.5rem;
    background: linear-gradient(135deg, #f8fcfd 0%, white 100%);
    border: 2px dashed rgba(66, 158, 189, 0.2);
    border-radius: 16px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.action-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(159, 231, 245, 0.2), transparent);
    transition: left 0.5s;
}

.action-item:hover::before {
    left: 100%;
}

.action-item:hover {
    border-color: var(--accent-medium);
    border-style: solid;
    background: linear-gradient(135deg, rgba(159, 231, 245, 0.05), rgba(66, 158, 189, 0.05));
    transform: translateX(4px);
    box-shadow: 0 8px 24px rgba(5, 63, 92, 0.1);
}

.action-icon-wrapper {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--primary-blue), var(--accent-medium));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: transform 0.3s;
}

.action-item:hover .action-icon-wrapper {
    transform: rotate(5deg) scale(1.05);
}

.action-icon {
    width: 24px;
    height: 24px;
    color: white;
}

.action-content {
    flex: 1;
}

.action-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--primary-blue);
    margin-bottom: 0.25rem;
}

.action-description {
    font-size: 0.8rem;
    color: var(--text-muted);
}

.action-arrow {
    width: 32px;
    height: 32px;
    background: rgba(66, 158, 189, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-medium);
    transition: all 0.3s;
}

.action-item:hover .action-arrow {
    background: var(--accent-orange);
    color: white;
    transform: rotate(-45deg);
}

/* Responsive */
@media (max-width: 1200px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
    
    .quick-actions-section {
        order: -1;
    }
}

@media (max-width: 768px) {
    .dashboard-container {
        padding: 1rem;
    }
    
    .welcome-banner {
        padding: 2rem;
    }
    
    .welcome-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 1.5rem;
    }
    
    .welcome-title {
        font-size: 1.5rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .population-grid {
        grid-template-columns: 1fr;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .stat-card {
        flex-direction: column;
        text-align: center;
    }
    
    .stat-icon-wrapper {
        margin: 0 auto;
    }
}
</style>
@endsection