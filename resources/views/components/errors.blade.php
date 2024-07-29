<div class="fixed-top">
    @if(session('error'))
    <div class="alertx alertx-error">
        <div class="icon__wrapper px-2">
            <i class="text-white bi bi-exclamation-triangle"></i>
        </div>
        <p>{{ session('error') }}</p>
        <i class="text-white bi bi-x close-alertx"></i>
    </div>
    @endif
</div>

<style>
    :root {
        --primary: #0676ed;
        --background: #222b45;
        --warning: #f2a600;
        --success: #12c99b;
        --error: #e41749;
        --dark: #151a30;
    }

    .alertx {
        margin-top: 100px;
        margin-left: 10px;
        min-height: 67px;
        width: 300px;
        max-width: 90%;
        border-radius: 12px;
        padding: 16px 22px 17px 20px;
        display: flex;
        align-items: center;
        position: relative;
        transition: opacity 0.5s ease-in-out;
    }

    .alertx-warning {
        background: var(--warning);
    }

    .alertx-success {
        background: var(--success);
    }

    .alertx-primary {
        background: var(--primary);
    }

    .alertx-dark {
        background: var(--dark);
    }

    .alertx-error {
        background: var(--error);
    }

    .alertx .icon__wrapper {
        height: 34px;
        width: 34px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.253);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alertx .icon__wrapper span {
        font-size: 21px;
        color: #fff;
    }

    .alertx p {
        color: #fff;
        font-family: Verdana;
        margin-left: 10px;
        margin-right: 20px;
    }

    .alertx p a,
    .alertx p a:visited,
    .alertx p a:active {
        color: #fff;
    }

    .alertx .close-alertx {
        color: #fff;
        transition: transform 0.5s;
        font-size: 18px;
        cursor: pointer;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    .alertx .close-alertx:hover {
        transform: scale(1.3) translateY(-50%);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tự động ẩn thông báo sau 5 giây
        setTimeout(function() {
            const alert = document.querySelector('.alertx');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500); // Thời gian cho transition opacity
            }
        }, 5000);

       
    });
</script>
