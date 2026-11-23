import { Link } from "react-router";

export default function HomePage() {
    return (
        <div>
            this is home page
            <Link to="/about" className="bg-red-400 text-white">
                go to about
            </Link>
        </div>
    );
}
