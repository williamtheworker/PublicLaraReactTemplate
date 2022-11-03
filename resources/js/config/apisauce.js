import { create } from 'apisauce';

const api = create({
    baseUrl: 'http://127.0.0.1:8000/',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')  
    },
});

export default api;