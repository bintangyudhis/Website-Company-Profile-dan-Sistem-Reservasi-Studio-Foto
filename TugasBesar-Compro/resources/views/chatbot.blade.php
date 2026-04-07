<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chatbot - Sejenak Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #e5ddd5;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9c0b5' fill-opacity='0.3'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        /* ========== HEADER ========== */
        .chat-header {
            background: #075e54;
            color: white;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.3);
            z-index: 10;
            flex-shrink: 0;
        }

        .back-btn {
            color: white;
            text-decoration: none;
            font-size: 20px;
            line-height: 1;
        }

        .bot-avatar {
            width: 42px;
            height: 42px;
            background: #25d366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .bot-info h6 { margin: 0; font-size: 15px; font-weight: 600; }
        .bot-info small { font-size: 12px; color: #b2dfdb; }

        /* ========== CHAT AREA ========== */
        #chat-area {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            scroll-behavior: smooth;
        }

        /* Scrollbar */
        #chat-area::-webkit-scrollbar { width: 6px; }
        #chat-area::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.2); border-radius: 3px; }

        /* ========== MESSAGE BUBBLES ========== */
        .msg-wrapper {
            display: flex;
            flex-direction: column;
            max-width: 72%;
            animation: fadeUp 0.2s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .msg-wrapper.user  { align-self: flex-end;  align-items: flex-end; }
        .msg-wrapper.bot   { align-self: flex-start; align-items: flex-start; }

        .bubble {
            padding: 9px 14px;
            border-radius: 8px;
            font-size: 14px;
            line-height: 1.5;
            position: relative;
            box-shadow: 0 1px 1px rgba(0,0,0,0.12);
            white-space: pre-wrap;
            word-break: break-word;
        }

        .bubble.user-bubble {
            background: #dcf8c6;
            border-top-right-radius: 2px;
        }

        .bubble.bot-bubble {
            background: #ffffff;
            border-top-left-radius: 2px;
        }

        .msg-time {
            font-size: 11px;
            color: #999;
            margin-top: 2px;
            padding: 0 4px;
        }

        /* ========== TYPING INDICATOR ========== */
        #typing-indicator {
            display: none;
            align-self: flex-start;
            background: white;
            border-radius: 8px;
            border-top-left-radius: 2px;
            padding: 10px 16px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.12);
            animation: fadeUp 0.2s ease;
        }

        .typing-dots {
            display: flex;
            align-items: center;
            gap: 4px;
            height: 18px;
        }

        .typing-dots span {
            width: 7px;
            height: 7px;
            background: #aaa;
            border-radius: 50%;
            animation: typing 1.2s infinite ease-in-out;
        }
        .typing-dots span:nth-child(2) { animation-delay: 0.2s; }
        .typing-dots span:nth-child(3) { animation-delay: 0.4s; }

        @keyframes typing {
            0%, 60%, 100% { transform: translateY(0); }
            30%            { transform: translateY(-5px); }
        }

        /* ========== DATE SEPARATOR ========== */
        .date-separator {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 8px 0;
        }
        .date-separator span {
            background: rgba(255,255,255,0.7);
            padding: 3px 10px;
            border-radius: 8px;
            font-size: 12px;
            color: #555;
        }

        /* ========== QUICK REPLIES ========== */
        .quick-replies {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            padding: 6px 16px;
            background: transparent;
        }

        .quick-reply-btn {
            background: white;
            border: 1px solid #25d366;
            color: #075e54;
            border-radius: 16px;
            padding: 5px 12px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.15s;
            font-family: 'Poppins', sans-serif;
        }
        .quick-reply-btn:hover {
            background: #25d366;
            color: white;
        }

        /* ========== INPUT AREA ========== */
        .chat-footer {
            background: #f0f0f0;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        #msg-input {
            flex: 1;
            border: none;
            border-radius: 24px;
            padding: 10px 18px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            background: white;
            outline: none;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            resize: none;
            max-height: 100px;
            line-height: 1.4;
        }

        #send-btn {
            width: 46px;
            height: 46px;
            background: #075e54;
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
            flex-shrink: 0;
        }
        #send-btn:hover { background: #128c7e; }
        #send-btn:active { transform: scale(0.95); }
    </style>
</head>
<body>

    <!-- ========== HEADER ========== -->
    <div class="chat-header">
        <a href="{{ route('home') }}" class="back-btn" title="Kembali ke Home">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="bot-avatar">
            <i class="fas fa-robot"></i>
        </div>
        <div class="bot-info">
            <h6>Sejenak Bot</h6>
            <small id="bot-status">Online</small>
        </div>
    </div>

    <!-- ========== CHAT MESSAGES ========== -->
    <div id="chat-area">

        <div class="date-separator">
            <span>Hari ini, {{ now()->translatedFormat('d F Y') }}</span>
        </div>

        <!-- Pesan selamat datang dari bot -->
        <div class="msg-wrapper bot" id="welcome-msg">
            <div class="bubble bot-bubble">
                Halo! 👋 Saya <strong>Sejenak Bot</strong>, asisten virtual Sejenak Studio Purwokerto.<br><br>
                Silakan tanyakan apa saja seputar studio kami. Saya siap membantu!
            </div>
            <span class="msg-time">{{ now()->format('H:i') }}</span>
        </div>

        <!-- Typing indicator -->
        <div id="typing-indicator">
            <div class="typing-dots">
                <span></span><span></span><span></span>
            </div>
        </div>

    </div>

    <!-- ========== QUICK REPLY SUGGESTIONS ========== -->
    <div class="quick-replies" id="quick-replies">
        <button class="quick-reply-btn" onclick="sendQuick('Lokasi studio di mana?')">📍 Lokasi</button>
        <button class="quick-reply-btn" onclick="sendQuick('Jam buka studio?')">🕘 Jam Buka</button>
        <button class="quick-reply-btn" onclick="sendQuick('Berapa harga paket foto?')">💰 Harga</button>
        <button class="quick-reply-btn" onclick="sendQuick('Bagaimana cara reservasi?')">📝 Reservasi</button>
        <button class="quick-reply-btn" onclick="sendQuick('Kontak sejenak studio')">📞 Kontak</button>
    </div>

    <!-- ========== INPUT AREA ========== -->
    <div class="chat-footer">
        <textarea
            id="msg-input"
            placeholder="Ketik pesan..."
            rows="1"
            autofocus
        ></textarea>
        <button id="send-btn" title="Kirim">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>

    <script>
        // ======================================================
        // KONFIGURASI
        // ======================================================
        const CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').content;
        const CHAT_URL    = "{{ route('chatbot.chat') }}";
        const chatArea    = document.getElementById('chat-area');
        const msgInput    = document.getElementById('msg-input');
        const sendBtn     = document.getElementById('send-btn');
        const typingEl    = document.getElementById('typing-indicator');
        const botStatus   = document.getElementById('bot-status');

        // ======================================================
        // FUNGSI: Tambah bubble pesan ke layar
        // ======================================================
        function appendMessage(text, sender) {
            const wrapper = document.createElement('div');
            wrapper.classList.add('msg-wrapper', sender);

            const bubble = document.createElement('div');
            bubble.classList.add('bubble', sender === 'user' ? 'user-bubble' : 'bot-bubble');
            bubble.textContent = text; // pakai textContent agar aman dari XSS

            const time = document.createElement('span');
            time.classList.add('msg-time');
            time.textContent = getCurrentTime();

            wrapper.appendChild(bubble);
            wrapper.appendChild(time);

            // Sisipkan sebelum typing indicator agar urutan tetap benar
            chatArea.insertBefore(wrapper, typingEl);
            scrollToBottom();
        }

        // ======================================================
        // FUNGSI: Tampilkan / sembunyikan typing indicator
        // ======================================================
        function showTyping() {
            typingEl.style.display = 'block';
            botStatus.textContent  = 'sedang mengetik...';
            scrollToBottom();
        }

        function hideTyping() {
            typingEl.style.display = 'none';
            botStatus.textContent  = 'Online';
        }

        // ======================================================
        // FUNGSI: Kirim pesan ke server via Fetch API
        // ======================================================
        async function sendMessage() {
            const text = msgInput.value.trim();
            if (!text) return;

            // Tampilkan pesan user di layar
            appendMessage(text, 'user');
            msgInput.value = '';
            autoResize();

            // Nonaktifkan input sementara & tampilkan typing
            msgInput.disabled = true;
            sendBtn.disabled  = true;
            showTyping();

            // Sembunyikan quick reply setelah pertama kali mengirim
            document.getElementById('quick-replies').style.display = 'none';

            try {
                // Kirim ke server dengan Fetch API (AJAX, tanpa reload halaman)
                const response = await fetch(CHAT_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept':       'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    body: JSON.stringify({ message: text })
                });

                const data = await response.json();

                // Simulasi delay supaya terasa natural (seolah bot sedang berpikir)
                await sleep(600 + Math.random() * 500);

                hideTyping();
                appendMessage(data.reply, 'bot');

            } catch (error) {
                hideTyping();
                appendMessage('Maaf, terjadi gangguan koneksi. Silakan coba lagi.', 'bot');
                console.error('Chatbot error:', error);
            } finally {
                msgInput.disabled = false;
                sendBtn.disabled  = false;
                msgInput.focus();
            }
        }

        // ======================================================
        // FUNGSI: Kirim pesan dari tombol quick reply
        // ======================================================
        function sendQuick(text) {
            msgInput.value = text;
            sendMessage();
        }

        // ======================================================
        // UTILITAS
        // ======================================================
        function scrollToBottom() {
            chatArea.scrollTop = chatArea.scrollHeight;
        }

        function getCurrentTime() {
            const now = new Date();
            return now.getHours().toString().padStart(2,'0') + ':' +
                   now.getMinutes().toString().padStart(2,'0');
        }

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        // Auto-resize textarea sesuai isi
        function autoResize() {
            msgInput.style.height = 'auto';
            msgInput.style.height = Math.min(msgInput.scrollHeight, 100) + 'px';
        }

        // ======================================================
        // EVENT LISTENERS
        // ======================================================
        sendBtn.addEventListener('click', sendMessage);

        msgInput.addEventListener('keydown', function(e) {
            // Enter = kirim, Shift+Enter = newline
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });

        msgInput.addEventListener('input', autoResize);

        // Scroll ke bawah saat load
        scrollToBottom();
    </script>
</body>
</html>
