<x-store-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-black text-white mb-4">Contacto</h1>
                <p class="text-gray-400">¿Tienes alguna pregunta? Estamos aquí para ayudarte</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Formulario de contacto -->
                <div class="bg-gamer-card rounded-2xl border border-neon-blue/20 p-8">
                    <h2 class="text-2xl font-bold text-white mb-6">Envíanos un mensaje</h2>
                    
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-gray-300 mb-2">Nombre</label>
                            <input type="text" name="name" class="w-full bg-gamer-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-neon-blue transition">
                        </div>
                        
                        <div>
                            <label class="block text-gray-300 mb-2">Email</label>
                            <input type="email" name="email" class="w-full bg-gamer-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-neon-blue transition">
                        </div>
                        
                        <div>
                            <label class="block text-gray-300 mb-2">Mensaje</label>
                            <textarea name="message" rows="5" class="w-full bg-gamer-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-neon-blue transition"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full px-6 py-3 bg-neon-blue text-gamer-dark font-bold rounded-lg hover:scale-105 transition shadow-[0_0_20px_rgba(0,210,255,0.4)]">
                            Enviar mensaje
                        </button>
                    </form>
                </div>
                
                <!-- Información de contacto -->
                <div class="space-y-6">
                    <div class="bg-gamer-card rounded-2xl border border-neon-purple/20 p-8">
                        <h2 class="text-2xl font-bold text-white mb-6">Información de contacto</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4">
                                <div class="text-neon-purple text-xl">📍</div>
                                <div>
                                    <h3 class="text-white font-bold">Dirección</h3>
                                    <p class="text-gray-400">Calle Principal 123, Madrid, España</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="text-neon-purple text-xl">📞</div>
                                <div>
                                    <h3 class="text-white font-bold">Teléfono</h3>
                                    <p class="text-gray-400">+34 900 123 456</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="text-neon-purple text-xl">✉️</div>
                                <div>
                                    <h3 class="text-white font-bold">Email</h3>
                                    <p class="text-gray-400">info@gamerguild.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="text-neon-purple text-xl">⏰</div>
                                <div>
                                    <h3 class="text-white font-bold">Horario</h3>
                                    <p class="text-gray-400">Lunes a Viernes: 10:00 - 20:00</p>
                                    <p class="text-gray-400">Sábados: 11:00 - 18:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Redes sociales -->
                    <div class="bg-gamer-card rounded-2xl border border-neon-red/20 p-8">
                        <h2 class="text-2xl font-bold text-white mb-4">Síguenos</h2>
                        <div class="flex space-x-4">
                            <a href="#" class="p-3 bg-gray-800 rounded-full hover:bg-neon-blue transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </a>
                            <a href="#" class="p-3 bg-gray-800 rounded-full hover:bg-neon-purple transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/></svg>
                            </a>
                            <a href="#" class="p-3 bg-gray-800 rounded-full hover:bg-neon-red transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-store-layout>
