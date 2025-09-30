import Button from "./ui/Button";

export default function TreatmentCard({ href, name, image }: { href: string; name: string; image?: string }) {
    return (
        <li className="border rounded overflow-hidden group">
            {image ? <img src={image} alt={name} className="w-full h-40 object-cover" /> : null}
            <div className="p-4">
                <div className="font-medium mb-2">{name}</div>
                <Button asLinkHref={href} className="border">{`>`}</Button>
            </div>
        </li>
    );
}
