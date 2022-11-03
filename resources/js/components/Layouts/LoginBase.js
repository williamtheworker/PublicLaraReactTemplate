import React from 'react';
import { Box, Grid } from '@mui/material';

const LoginBase = (props) => {
    const { children } = props;

    return (
        <Box
            sx={{
                height: '100vh',
            }}
        >
            <Grid
                sx={{
                    minWidth: "100%",
                    minHeight: "100vh",
                    display: "flex",
                    flexDirection: "column",
                    justifyContent: "center"
                }}
                alignItems='center'
                justify='center'
            >
                { children }
            </Grid>
        </Box>
    );
};

export default LoginBase;