import TreatmentCard from "./TreatmentCard";

export default function TreatmentGrid({ locale, items }: { locale: "tr" | "en"; items: { slug: string; name: string; image?: string }[] }) {
    return (
        <ul className="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            {items.map(i => (
                <TreatmentCard key={i.slug} href={`/${locale}/${i.slug}`} name={i.name} image={i.image} />
            ))}
        </ul>
    );
}
