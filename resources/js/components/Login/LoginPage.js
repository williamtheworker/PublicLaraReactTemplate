import React, { useState } from 'react';
import { createRoot } from 'react-dom/client';
// MUI Components
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import Button from '@mui/material/Button';
// Components
import LoginBase from '../Layouts/LoginBase';
import CustomTextField from '../CustomComponents/CustomTextField';
import CustomButtonSpinner from '../CustomComponents/CustomButtonSpinner';
// Additional Scripts
import api from '../../config/apisauce';
import { Formik, Form } from 'formik';
import * as yup from 'yup';

const validationSchema = yup.object({
    email: yup.string().email('Enter a valid email').required('Email is Required').max('250'),
    password: yup.string().required('Please input your password')
});

const LoginPage = (props) => {
    const [ disableButton, setDisableButton ] = useState(false);
    
    const login = (data) => {
        setDisableButton(true);
        api.post('/login/authenticate', data).then(
            (response) => {
                if(response.data.status == 'success') {
                    window.location.href = window.location.origin+'/dashboard';
                } else {
                    alert(response.data.message);
                    setDisableButton(false);
                }
            }
        );
    }

    return (
        <LoginBase>
            <Formik
                validateOnChange={true}
                initialValues={{
                    email:      '',
                    password:   ''
                }}
                validationSchema={validationSchema}
                onSubmit={(data) => {
                    login(data);
                }}
            >
                {({values, handleChange, errors, touched}) => (
                    <Form>
                        <Box>
                            <Grid
                                container
                                spacing={2}
                                justify="center"
                            >
                                <Grid item xs={12}>
                                    <CustomTextField
                                        placeholder="Email"
                                        label="Email"
                                        name="email"
                                    />
                                </Grid>
                                <Grid item xs={12}>
                                    <CustomTextField
                                        placeholder="Password"
                                        label="Password"
                                        name="password"
                                        type="password"
                                    />
                                </Grid>
                                <Grid item xs={12}>
                                    <Button variant="contained" size="large" type="submit" fullWidth disabled={disableButton} 
                                        endIcon={<CustomButtonSpinner show={disableButton}/>}
                                    >
                                        Login
                                    </Button>
                                </Grid>
                            </Grid>
                        </Box>
                        {/* <pre>
                            {JSON.stringify(values, null , 2)}
                        </pre> */}
                    </Form>
                )}
            </Formik>
        </LoginBase>
    );
};

export default LoginPage;

if (document.getElementById('login-page')) {
    const root = createRoot(document.getElementById('login-page'));
    root.render(<LoginPage/>);
}