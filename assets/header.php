<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'PaceStore') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --black:   #0A0A0A;
            --card:    #141414;
            --surface: #1E1E1E;
            --border:  #2C2C2C;
            --muted:   #555;
            --text:    #F5F5F0;
            --sub:     #999;
            --accent:  #E8FF3C;
            --danger:  #FF4D4D;
            --success: #3CFF8F;
            --radius:  6px;
            --font-display: 'Space Grotesk', sans-serif;
            --font-body:    'Inter', sans-serif;
        }

        html { font-size: 16px; }
        body {
            background: var(--black);
            color: var(--text);
            font-family: var(--font-body);
            min-height: 100vh;
            line-height: 1.6;
        }

        /* ── PACE STRIP ── */
        .pace-strip {
            background: var(--accent);
            color: var(--black);
            font-family: var(--font-display);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 0.35rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* ── NAV ── */
        nav {
            background: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-brand {
            font-family: var(--font-display);
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text);
            text-decoration: none;
            letter-spacing: -0.02em;
        }
        .nav-brand span { color: var(--accent); }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
        }
        .nav-links a {
            color: var(--sub);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.4rem 0.85rem;
            border-radius: var(--radius);
            transition: color 0.15s, background 0.15s;
        }
        .nav-links a:hover,
        .nav-links a.active { color: var(--text); background: var(--surface); }
        .nav-right {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .btn-nav {
            background: var(--accent);
            color: var(--black);
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.45rem 1rem;
            border-radius: var(--radius);
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .btn-nav:hover { opacity: 0.85; }

        /* ── MAIN CONTENT ── */
        main { max-width: 1280px; margin: 0 auto; padding: 2.5rem 2rem; }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 2rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid var(--border);
        }
        .page-header h1 {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.03em;
        }
        .page-header h1 .accent { color: var(--accent); }

        /* ── BUTTONS ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.55rem 1.1rem;
            border-radius: var(--radius);
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            text-decoration: none;
            border: 1px solid transparent;
            transition: opacity 0.15s, background 0.15s;
        }
        .btn-primary   { background: var(--accent); color: var(--black); }
        .btn-secondary { background: var(--surface); color: var(--text); border-color: var(--border); }
        .btn-danger    { background: transparent; color: var(--danger); border-color: var(--danger); }
        .btn-success   { background: transparent; color: var(--success); border-color: var(--success); }
        .btn:hover     { opacity: 0.8; }
        .btn-sm        { padding: 0.3rem 0.7rem; font-size: 0.78rem; }

        /* ── CARDS ── */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
        }

        /* ── TABLES ── */
        .table-wrap { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        th {
            font-family: var(--font-display);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--sub);
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }
        td {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: var(--surface); }

        /* ── FORMS ── */
        .form-grid { display: grid; gap: 1.25rem; }
        .form-grid-2 { grid-template-columns: 1fr 1fr; }
        .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
        label {
            font-family: var(--font-display);
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--sub);
        }
        input, select, textarea {
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--text);
            font-family: var(--font-body);
            font-size: 0.9rem;
            padding: 0.65rem 0.9rem;
            border-radius: var(--radius);
            outline: none;
            width: 100%;
            transition: border-color 0.15s;
        }
        input:focus, select:focus, textarea:focus {
            border-color: var(--accent);
        }
        textarea { resize: vertical; min-height: 120px; }
        .form-actions {
            display: flex;
            gap: 0.75rem;
            padding-top: 0.5rem;
            border-top: 1px solid var(--border);
            margin-top: 0.5rem;
        }

        /* ── BADGES ── */
        .badge {
            display: inline-block;
            font-size: 0.7rem;
            font-family: var(--font-display);
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.2rem 0.55rem;
            border-radius: 100px;
        }
        .badge-yellow  { background: rgba(232,255,60,0.12); color: var(--accent); }
        .badge-green   { background: rgba(60,255,143,0.12); color: var(--success); }
        .badge-red     { background: rgba(255,77,77,0.12);  color: var(--danger); }
        .badge-gray    { background: var(--surface);         color: var(--sub); }

        /* ── ALERTS ── */
        .alert {
            padding: 0.9rem 1.1rem;
            border-radius: var(--radius);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        .alert-success { background: rgba(60,255,143,0.08); border: 1px solid rgba(60,255,143,0.3); color: var(--success); }
        .alert-error   { background: rgba(255,77,77,0.08);  border: 1px solid rgba(255,77,77,0.3);  color: var(--danger); }

        /* ── EMPTY STATE ── */
        .empty {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--sub);
        }
        .empty-icon { font-size: 2.5rem; margin-bottom: 1rem; opacity: 0.4; }
        .empty h3 { font-family: var(--font-display); font-size: 1.1rem; color: var(--text); margin-bottom: 0.5rem; }

        /* ── STAT CARDS ── */
        .stats-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-bottom: 2rem; }
        .stat-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem;
        }
        .stat-label {
            font-family: var(--font-display);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--sub);
            margin-bottom: 0.5rem;
        }
        .stat-value {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.04em;
            line-height: 1;
        }
        .stat-value.accent { color: var(--accent); }

        /* ── BREADCRUMB ── */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.82rem;
            color: var(--sub);
            margin-bottom: 1.5rem;
        }
        .breadcrumb a { color: var(--sub); text-decoration: none; }
        .breadcrumb a:hover { color: var(--accent); }
        .breadcrumb .sep { opacity: 0.4; }

        /* ── PRODUCT GRID ── */
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 1.25rem; }
        .product-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            text-decoration: none;
            color: var(--text);
            transition: border-color 0.2s, transform 0.2s;
            display: block;
        }
        .product-card:hover { border-color: var(--accent); transform: translateY(-2px); }
        .product-thumb {
            width: 100%;
            aspect-ratio: 4/3;
            background: var(--surface);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            font-size: 2.5rem;
        }
        .product-thumb img { width: 100%; height: 100%; object-fit: cover; }
        .product-info { padding: 1rem; }
        .product-brand { font-size: 0.72rem; color: var(--accent); font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 0.25rem; }
        .product-name { font-family: var(--font-display); font-weight: 600; font-size: 0.95rem; margin-bottom: 0.5rem; line-height: 1.3; }
        .product-price { font-family: var(--font-display); font-weight: 700; font-size: 1.05rem; }

        @media (max-width: 768px) {
            nav { padding: 0 1rem; }
            main { padding: 1.5rem 1rem; }
            .form-grid-2 { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: flex-start; gap: 1rem; }
        }
    </style>
</head>
<body>

<div class="pace-strip">
    <span>PaceStore — Running Gear</span>
    <span><?= date('D, d M Y') ?></span>
</div>

<nav>
    <a href="/products" class="nav-brand">Pace<span>Store</span></a>
    <ul class="nav-links">
        <li><a href="/products" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/products') ? 'active' : '' ?>">Shop</a></li>
        <li><a href="/collections" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/collections') ? 'active' : '' ?>">Collections</a></li>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
        <li><a href="/admin" class="<?= str_starts_with($_SERVER['REQUEST_URI'], '/admin') ? 'active' : '' ?>">Admin</a></li>
        <?php endif; ?>
    </ul>
    <div class="nav-right">
        <?php if (isset($_SESSION['user'])): ?>
            <span style="font-size:.85rem;color:var(--sub)">
                <?= htmlspecialchars($_SESSION['user']['first_name']) ?>
            </span>
            <a href="/logout" class="btn-nav">Log out</a>
        <?php else: ?>
            <a href="/login" class="btn-nav">Log in</a>
        <?php endif; ?>
    </div>
</nav>

<main>

<?php if (!empty($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
        <?= htmlspecialchars($_SESSION['flash']['message']) ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>