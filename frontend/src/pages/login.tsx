import { Link } from "react-router";

export default function RegisterPage() {
    return (
        <div>
            this is about page{" "}
            <Link to="/" className="bg-blue-600 text-white">
                go to login
            </Link>
        </div>
    );
}
