import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
// MUI Components
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import Typography from '@mui/material/Typography';
//  Custom Components
import Base from '../Layouts/Base';

const DashboardPage = (props) => {

    const GridCard = (props) => {
        const { title, value } = props;

        return (
            <Grid item xs={4}>
                <Box
                    sx={{
                        backgroundColor: '#ffffff',
                        padding: '10px',
                        border: '1',
                        borderColor: '#e0e0e0',
                        borderRadius: '2px'
                    }}
                >
                    <Typography variant="h5" gutterBottom>{title}</Typography>
                    <Typography variant="h4">{value}</Typography>
                </Box>
            </Grid>
        );
    }

    return (
        <Base>
            <Box sx={{ flexGrow: 1 }} m={2}>
                <Grid container spacing={2}>
                    <Grid container item xs={12}>
                        <Grid item xs={12}>
                            <Typography variant="h4" sx={{ color: '#b8b7b9' }}>
                                Dashboard
                            </Typography>
                        </Grid>
                    </Grid>
                    <Grid container item xs={12} spacing={2}>
                        <GridCard
                            title={"Stats 1"}
                            value={"69420"}
                        />
                        <GridCard
                            title={"Stats 2"}
                            value={"77700"}
                        />
                        <GridCard
                            title={"Stats 3"}
                            value={"11000"}
                        />
                    </Grid>
                    <Grid container item xs={12}>
                        <Grid item xs={12} >
                        </Grid>
                    </Grid>
                </Grid>
            </Box>
        </Base>
    );
};

export default DashboardPage;

if (document.getElementById('dashboard-page')) {
    const root = createRoot(document.getElementById('dashboard-page'));
    root.render(<DashboardPage/>);
}