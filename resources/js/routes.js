import RegistationForm from './components/RegistrationFormComponent';
import Success from './components/SuccessComponent';

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'Registration',
            component: RegistationForm
        },
        {
            path: '/success',
            name: 'Success',
            component: Success
        }
    ]
}