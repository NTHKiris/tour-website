<div id="chatbase-bubble"
    class="fixed bottom-8 right-8 z-50 w-16 h-16 bg-cyan-500 rounded-full flex items-center justify-center shadow-lg cursor-pointer hover:bg-cyan-600 transition">
    <i class="fas fa-comments text-white text-2xl"></i>
</div>
<div id="chatbase-iframe-container"
    class="hidden fixed bottom-28 right-8 z-50 w-[350px] h-[500px] bg-white rounded-2xl shadow-2xl overflow-hidden border border-cyan-200">
    <iframe src="https://www.chatbase.co/chatbot-iframe/{{ env('CHATBOT_ID') }}" width="100%" height="100%"
        frameborder="0"></iframe>
</div>
<script>
    const bubble = document.getElementById('chatbase-bubble');
    const iframeContainer = document.getElementById('chatbase-iframe-container');
    let isOpen = false;
    bubble.onclick = function () {
        isOpen = !isOpen;
        iframeContainer.classList.toggle('hidden', !isOpen);
    };

    document.addEventListener('click', function (e) {
        if (isOpen && !iframeContainer.contains(e.target) && !bubble.contains(e.target)) {
            iframeContainer.classList.add('hidden');
            isOpen = false;
        }
    });
</script>