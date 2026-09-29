<?php
// ============================================
// Muhammad Yaser · PS5 Dashboard
// Single hero launcher with background
// File: index.php
// ============================================

date_default_timezone_set('Asia/Kabul');

$developer = "Muhammad Yaser";

$launch_url   = "Relapse-Exploit-main/index.html";
$launch_title = "RELAUNCH";
$launch_desc  = "run exploit · load payloads";

$bg_url = "pic/pic.png";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <title><?php echo htmlspecialchars($developer); ?> · PS5</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
      /* Dark blue base */
      --bg-1: #0d1526;
      --bg-2: #101a30;
      --bg-3: #0a1120;

      --text: #e8eefc;
      --dim: #8a9cbb;
      --dim-2: #5a6d8c;

      /* Purple accent */
      --purple: #7c5cff;
      --purple-2: #9b7fff;
      --purple-3: #bfaaff;
      --purple-deep: #6244d6;
      --accent: #a78bfa;
    }

    html, body {
      height: 100%;
      background: var(--bg-1);
      color: var(--text);
      font-family: 'Segoe UI', 'Inter', system-ui, -apple-system, sans-serif;
      overflow: hidden;
      -webkit-font-smoothing: antialiased;
      font-size: 17px;
    }

    /* Dark blue ambient gradient across the whole page */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background:
        radial-gradient(circle at 15% 20%, rgba(124, 92, 255, 0.14) 0%, transparent 50%),
        radial-gradient(circle at 85% 80%, rgba(60, 120, 220, 0.12) 0%, transparent 50%),
        linear-gradient(145deg, var(--bg-1) 0%, var(--bg-2) 50%, var(--bg-3) 100%);
      z-index: -3;
      pointer-events: none;
    }

    /* ---------- BACKGROUND IMAGE ---------- */
    #bg {
      position: fixed;
      inset: 0;
      background-color: transparent;

      background-image:
        url('/pic/pic.png'),
        url('pic/pic.png'),
        url('./pic/pic.png');

      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      opacity: 0.35;
      z-index: -2;
      pointer-events: none;
    }

    /* Dark blue vignette over the image */
    #bg-overlay {
      position: fixed;
      inset: 0;
      background:
        radial-gradient(circle at 50% 45%,
          transparent 0%,
          rgba(13, 21, 38, 0.55) 55%,
          rgba(13, 21, 38, 0.88) 100%),
        linear-gradient(180deg,
          rgba(13, 21, 38, 0.35) 0%,
          rgba(13, 21, 38, 0.75) 100%);
      z-index: -1;
      pointer-events: none;
    }

    /* ---------- LAYOUT ---------- */
    .stage {
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 2rem 1.5rem;
      position: relative;
    }

    /* ---------- BRAND ---------- */
    .brand {
      position: absolute;
      top: clamp(1.5rem, 3vw, 2.8rem);
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
      pointer-events: none;
    }

    .brand h1 {
      font-size: clamp(1.6rem, 1.8vw + 0.8rem, 2.6rem);
      font-weight: 400;
      letter-spacing: clamp(4px, 0.6vw, 10px);
      color: var(--accent);
      text-shadow: 0 0 28px rgba(167, 139, 250, 0.5);
    }

    .brand .dev {
      margin-top: 0.6rem;
      font-size: clamp(0.75rem, 0.4vw + 0.5rem, 1rem);
      letter-spacing: 4px;
      color: var(--dim);
      text-transform: uppercase;
    }

    .brand .dev span {
      color: var(--accent);
      font-weight: 700;
    }

    /* ---------- HERO START BUTTON ---------- */
    .hero {
      position: relative;
      width: clamp(240px, 24vw, 340px);
      height: clamp(240px, 24vw, 340px);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      color: inherit;
      cursor: pointer;
      outline: none;
      transition: transform 0.25s cubic-bezier(0.34, 1.4, 0.64, 1);
      will-change: transform;
    }

    /* Rotating dashed halo */
    .hero::before {
      content: '';
      position: absolute;
      inset: -22px;
      border-radius: 50%;
      border: 1px dashed rgba(167, 139, 250, 0.28);
      animation: spin 30s linear infinite;
    }

    /* Pulsing glow ring */
    .hero::after {
      content: '';
      position: absolute;
      inset: -10px;
      border-radius: 50%;
      border: 1px solid rgba(167, 139, 250, 0.4);
      box-shadow:
        0 0 44px rgba(124, 92, 255, 0.4),
        inset 0 0 32px rgba(124, 92, 255, 0.18);
      animation: breathe 3.2s ease-in-out infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    @keyframes breathe {
      0%, 100% { opacity: 0.6; transform: scale(1); }
      50%      { opacity: 1;   transform: scale(1.03); }
    }

    /* The big button surface */
    .hero .surface {
      position: relative;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background:
        radial-gradient(circle at 30% 25%, rgba(167, 139, 250, 0.14) 0%, transparent 55%),
        radial-gradient(circle at 70% 80%, rgba(124, 92, 255, 0.28) 0%, transparent 55%),
        linear-gradient(145deg, rgba(24, 32, 58, 0.92), rgba(10, 14, 28, 0.96));
      border: 2px solid rgba(124, 92, 255, 0.6);
      box-shadow:
        inset 0 2px 22px rgba(167, 139, 250, 0.18),
        inset 0 -4px 32px rgba(0, 0, 0, 0.55),
        0 20px 60px -10px rgba(0, 0, 0, 0.9),
        0 0 40px rgba(124, 92, 255, 0.15);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      text-align: center;
      transition: all 0.25s ease;
    }

    /* Play triangle */
    .hero .play {
      font-size: clamp(3rem, 4.5vw + 1rem, 5rem);
      color: var(--accent);
      text-shadow:
        0 0 22px rgba(167, 139, 250, 0.9),
        0 0 44px rgba(124, 92, 255, 0.6);
      line-height: 1;
      transform: translateX(4px);
      transition: transform 0.25s ease;
    }

    .hero .title {
      font-size: clamp(0.95rem, 0.6vw + 0.75rem, 1.35rem);
      font-weight: 700;
      letter-spacing: 6px;
      color: #fff;
      text-shadow: 0 2px 12px rgba(0, 0, 0, 0.9);
    }

    .hero .sub {
      font-size: clamp(0.7rem, 0.4vw + 0.5rem, 0.9rem);
      letter-spacing: 2px;
      color: var(--dim);
    }

    /* HOVER / FOCUS */
    .hero:hover,
    .hero:focus-visible {
      transform: scale(1.05);
    }

    .hero:hover .surface,
    .hero:focus-visible .surface {
      border-color: var(--purple-3);
      box-shadow:
        inset 0 2px 30px rgba(167, 139, 250, 0.35),
        inset 0 -4px 32px rgba(0, 0, 0, 0.55),
        0 0 70px -4px rgba(124, 92, 255, 0.8),
        0 24px 70px -10px rgba(0, 0, 0, 0.95);
    }

    .hero:hover .play,
    .hero:focus-visible .play {
      transform: translateX(6px) scale(1.06);
      color: #c4b5fd;
    }

    .hero:focus-visible {
      outline: 3px solid var(--purple-3);
      outline-offset: 20px;
      border-radius: 50%;
    }

    .hero:active .surface {
      transform: scale(0.96);
      transition-duration: 0.08s;
    }

    /* ---------- HINT UNDER BUTTON ---------- */
    .hint {
      margin-top: clamp(2.8rem, 4.5vw, 4.2rem);
      font-size: clamp(0.8rem, 0.45vw + 0.55rem, 1rem);
      letter-spacing: 3px;
      color: var(--dim-2);
      text-transform: uppercase;
      text-align: center;
    }

    .hint b {
      color: var(--accent);
      font-weight: 700;
    }

    /* ---------- CREDIT ---------- */
    .credit {
      position: absolute;
      bottom: clamp(1rem, 2vw, 2rem);
      left: 50%;
      transform: translateX(-50%);
      font-size: clamp(0.7rem, 0.35vw + 0.5rem, 0.9rem);
      letter-spacing: 3px;
      color: var(--dim-2);
      text-transform: uppercase;
      pointer-events: none;
    }

    .credit span {
      color: var(--accent);
      font-weight: 700;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 480px) {
      .hero::before { inset: -14px; }
      .hero::after  { inset: -6px; }
      .hint         { letter-spacing: 2px; }
    }

    @media (min-width: 2560px) {
      .hero { width: 400px; height: 400px; }
      .hero .play { font-size: 6rem; }
      .hero .title { font-size: 1.6rem; }
      .hero .sub { font-size: 1.05rem; }
    }
  </style>
</head>
<body>
  <div id="bg"></div>
  <div id="bg-overlay"></div>

  <div class="stage">

    <div class="brand">
      <h1>PS5 · RELAPSE</h1>
      <div class="dev">developed by <span><?php echo htmlspecialchars($developer); ?></span></div>
    </div>

    <a href="<?php echo htmlspecialchars($launch_url); ?>" class="hero" tabindex="0">
      <div class="surface">
        <div class="play">▶</div>
        <div class="title"><?php echo htmlspecialchars($launch_title); ?></div>
        <div class="sub"><?php echo htmlspecialchars($launch_desc); ?></div>
      </div>
    </a>

    <div class="hint">
      press <b>X</b> or click to launch
    </div>

    <div class="credit">v1.0 · <span><?php echo htmlspecialchars($developer); ?></span></div>

  </div>
</body>
</html>