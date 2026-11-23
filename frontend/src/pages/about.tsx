import { Link } from "react-router";

export default function AboutPage() {
    return (
        <div>
            this is about page{" "}
            <Link to="/" className="bg-red-400 text-white">
                go to home
            </Link>
        </div>
    );
}
