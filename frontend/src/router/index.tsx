import { createBrowserRouter } from "react-router";
import AboutPage from "../pages/about";
import CreateEventPage from "../pages/create-event";
import EventManagementPage from "../pages/event-management";
import HomePage from "../pages/home";
import RegisterPage from "../pages/login";
import LoginPage from "../pages/register";

const router = createBrowserRouter([
    {
        path: "/",
        element: <HomePage />,
    },
    {
        path: "/about",
        element: <AboutPage />,
    },
    {
        path: "/register",
        element: <RegisterPage />,
    },
    {
        path: "/login",
        element: <LoginPage />,
    },
    {
        path: "/event-management",
        element: <EventManagementPage />,
    },
    {
        path: "create-event",
        element: <CreateEventPage />,
    },
]);

export default router;
