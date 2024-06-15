import axios from 'axios';

export async function fetchData() {
    try {
        const response = await axios.get('/api/stickyHeader');
        return {
            services: response.data.services,
            sections: response.data.sections,
            links: response.data.links,
        };
    } catch (error) {
        return {
            services: [],
            sections: [],
            links: {}
        };
    }
}
