import { Link } from "react-router";

export default function LoginPage() {
    return (
        <div>
            this is about page{" "}
            <Link to="/" className=" bg-black text-white">
                go to home
            </Link>
        </div>
    );
}
