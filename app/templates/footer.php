</div>
</main>

<footer class="site-footer">
    <div class="container">

        <div class="footer-wrap">

            <div class="footer-brand">

                <div class="footer-mark">
                    T
                </div>

                <div>
                    <div class="footer-name">
                        Torrent
                    </div>

                    <div class="footer-description">
                        Простой торрент-трекер
                    </div>
                </div>

            </div>

            <nav class="footer-nav">
                <a href="/index.php">Главная</a>
                <a href="#">Торренты</a>
                <a href="#">Категории</a>
            </nav>

            <div class="footer-copy">
                © <?= date('Y') ?> Torrent
            </div>

        </div>

    </div>
</footer>

<style>
    .site-footer {
        border-top: 1px solid var(--border);

        background: rgba(255, 255, 255, 0.58);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
    }

    .footer-wrap {
        min-height: 104px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 30px;

        padding-top: 22px;
        padding-bottom: 22px;
    }

    .footer-brand {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .footer-mark {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: linear-gradient(
                135deg,
                #6957f5 0%,
                #8478ff 100%
        );

        color: #fff;
        font-size: 0.9rem;
        font-weight: 800;

        box-shadow:
                0 8px 22px rgba(109, 93, 252, 0.20);
    }

    .footer-name {
        color: var(--text);

        font-size: 0.94rem;
        font-weight: 700;

        line-height: 1.15;
    }

    .footer-description {
        margin-top: 4px;

        color: #9a9fab;

        font-size: 0.78rem;
    }

    .footer-nav {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .footer-nav a {
        color: var(--muted);

        text-decoration: none;
        font-size: 0.84rem;
        font-weight: 500;

        transition: color 0.18s ease;
    }

    .footer-nav a:hover {
        color: var(--text);
    }

    .footer-copy {
        color: #9a9fab;

        font-size: 0.82rem;
        white-space: nowrap;
    }

    @media (max-width: 768px) {
        .footer-wrap {
            align-items: flex-start;
            flex-direction: column;

            min-height: auto;

            padding-top: 28px;
            padding-bottom: 28px;
        }

        .footer-nav {
            flex-wrap: wrap;
        }
    }
</style>

<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>