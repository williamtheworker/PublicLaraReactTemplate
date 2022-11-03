// MUI Components
import Chip from '@mui/material/Chip';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemButton from '@mui/material/ListItemButton';
import Grid from '@mui/material/Grid';
import Divider from '@mui/material/Divider';
import Drawer from '@mui/material/Drawer';
// MUI Icons
import AssessmentIcon from '@mui/icons-material/Assessment';
import BookmarkIcon from '@mui/icons-material/Bookmark';
import SettingsIcon from '@mui/icons-material/Settings';
import DashboardIcon from '@mui/icons-material/Dashboard';
// Custom Components
import CustomListItemText from '../CustomComponents/CustomListItemText';
import RelativeBox from '../CustomComponents/RelativeBox';

const SidePanel = (props) => {
    return (
        <Drawer
            variant='persistent'
            anchor='left'
            open={true}
            PaperProps={{
                sx: {
                    width: '230px',
                }
            }}
        >
            <RelativeBox
                sx={{
                    height: '56px',
                    maxHeight: '56px'
                }}
            >
                <Grid
                    container
                    spacing={0}
                    direction="column"
                    alignItems="center"
                    justifyContent="center"
                    sx={{
                        height: '100%'
                    }}
                >

                    <Grid
                        item
                        xs={3}
                    >
                        Logo Here
                    </Grid>   
                </Grid> 
            </RelativeBox>
            <Divider />
            <List>
                <Divider 
                    textAlign="left"
                    sx={{
                        margin: '0px 0px 8px'
                    }}
                >
                    <Chip
                        sx={{
                            fontSize: '0.696429rem',
                            height: '24px'
                        }}
                        label="LABEL"
                    />
                </Divider>
                <ListItem button component="a" href={window.location.origin + '/dashboard'} key={Math.random()} disablePadding>
                    <ListItemButton>
                        <DashboardIcon
                            sx={{
                                color: 'rgba(0, 0, 0, 0.54)',
                                flexShrink: 0,
                                display: 'inline-flex',
                                minWidth: '40px'
                            }}
                        />
                        <CustomListItemText>Dashboard</CustomListItemText>
                    </ListItemButton>
                </ListItem>
                <ListItem button component="a" href={window.location.origin + '/basic_table'} key={Math.random()} disablePadding>
                    <ListItemButton>
                        <AssessmentIcon
                            sx={{
                                color: 'rgba(0, 0, 0, 0.54)',
                                flexShrink: 0,
                                display: 'inline-flex',
                                minWidth: '40px'
                            }}
                        />
                        <CustomListItemText>Basic Table</CustomListItemText>
                    </ListItemButton>
                </ListItem>
                <ListItem button component="a" href={window.location.origin + '/intermediate_table'} key={Math.random()} disablePadding>
                    <ListItemButton>
                        <BookmarkIcon
                            sx={{
                                color: 'rgba(0, 0, 0, 0.54)',
                                flexShrink: 0,
                                display: 'inline-flex',
                                minWidth: '40px'
                            }}
                        />
                        <CustomListItemText>Intermediate Table</CustomListItemText>
                    </ListItemButton>
                </ListItem>
                <ListItem button component="a" href={window.location.origin + '/input_samples'} key={Math.random()} disablePadding>
                    <ListItemButton>
                        <SettingsIcon
                            sx={{
                                color: 'rgba(0, 0, 0, 0.54)',
                                flexShrink: 0,
                                display: 'inline-flex',
                                minWidth: '40px'
                            }}
                        />
                        <CustomListItemText>Input Samples</CustomListItemText>
                    </ListItemButton>
                </ListItem>
            </List>
        </Drawer>
    );
};

export default SidePanel;