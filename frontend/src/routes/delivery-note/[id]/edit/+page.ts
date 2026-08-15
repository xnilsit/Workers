import { PUBLIC_BACKEND_URL } from '$env/static/public';
import { error } from '@sveltejs/kit';

export const load = async ({ params, parent, fetch }) => {
    const { token } = await parent();
    const { id } = params;

    const res = await fetch(`${PUBLIC_BACKEND_URL}/delivery-note/${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`
        },
        body: null
    });

    if (!res.ok) {
        error(res.status === 404 ? 404 : 500, 'Delivery note not found');
    }

    return res.json();
}