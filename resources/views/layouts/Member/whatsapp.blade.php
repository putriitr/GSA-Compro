@php
    $compro = \App\Models\CompanyParameter::first();
@endphp

<!-- WhatsApp Floating Button -->
<div id="whatsapp-button" class="whatsapp-float" style="bottom: 100px;">
    <i class="fab fa-whatsapp fa"></i>
</div>

<div id="chat-form" class="chat-form hidden">
    <!-- Customer Service Chat Box (Left Side) -->
    <div class="chat-box customer-service">
        <div class="chat-avatar">
            <i class="fa fa-headset"></i>
        </div>
        <div class="chat-content">
            <strong>{{ __('messages.wa_help') }}</strong>
        </div>
    </div>

    <!-- Customer Chat Box (Right Side) -->
    <div class="chat-box customer">
        <div class="chat-content" style="margin-right: 10px;">
            <textarea id="chat-message" placeholder="{{ __('messages.your_message') }}" rows="3"></textarea>
        </div>
        <div class="chat-avatar">
            <i class="fas fa-user"></i>
        </div>
    </div>

    <!-- Send Message Button -->
    <button id="send-message">{{ __('messages.send_message') }} <i class="fas fa-paper-plane ms-2"></i></button>
</div>

<!-- Styles -->
<style>
    /* WhatsApp Floating Button */
    .whatsapp-float {
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background-color: #25D366;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        color: white;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .whatsapp-float i {
        font-size: 30px;
    }

    .whatsapp-float:hover {
        transform: scale(1.1);
    }

    /* Chat Form */
    .chat-form {
        position: fixed;
        bottom: 100px;
        right: 20px;
        z-index: 1001;
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 320px;
        max-width: 100%;
        opacity: 0;
        visibility: hidden;
        transform: translateY(50px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .chat-form.visible {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Customer Service Chat Box */
    .chat-box {
        display: flex;
        margin-bottom: 15px;
        align-items: center;
    }

    .customer-service {
        flex-direction: row;
    }

    .chat-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 40px;
        border-radius: 50%;
        background-color: #128C7E;
        color: white;
        font-size: 24px;
        margin-right: 15px;
        transition: transform 0.3s ease;
    }

    .chat-avatar .role-name {
        font-size: 14px;
        margin-left: 8px;
        /* Space between icon and text */
        color: white;
        font-weight: bold;
    }

    .chat-avatar:hover {
        transform: scale(1.2);
    }

    .chat-content {
        background-color: #f7f7f7;
        padding: 12px;
        border-radius: 10px;
        max-width: 260px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        word-wrap: break-word;
        font-family: 'Poppins', sans-serif;
    }

    .chat-content textarea {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
        resize: none;
        font-size: 14px;
        color: #333;
        background-color: #f9f9f9;
        transition: border 0.3s ease;
    }

    .chat-content textarea:focus {
        border-color: #4CAF50;
        outline: none;
    }

    /* Send Button */
    .chat-form button {
        width: 100%;
        padding: 12px;
        background: #128C7E;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        margin-top: 15px;
        transition: background-color 0.3s ease;
    }

    .chat-form button:hover {
        background: #47BDA9;
    }

    /* Animations */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(50px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .chat-form.visible {
        animation: fadeInUp 0.5s ease-out;
    }
</style>

<!-- Scripts -->
<script>
    document.getElementById('whatsapp-button').addEventListener('click', function() {
        const chatForm = document.getElementById('chat-form');
        chatForm.classList.toggle('hidden');
        chatForm.classList.toggle('visible');
    });

    document.getElementById('send-message').addEventListener('click', function() {
        const message = document.getElementById('chat-message').value;
        const phone = "{{ preg_replace('/\D/', '', $compro->no_wa ?? '') }}";

        if (message.trim() === '') {
            alert('Pesan tidak boleh kosong!');
            return;
        }

        const url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
    });
</script>
