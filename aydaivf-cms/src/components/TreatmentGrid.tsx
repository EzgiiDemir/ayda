import Image from "next/image";

export default function TreatmentGrid({ items }: { items: { slug: string; name: string; image?: string }[] }) {
    return (
        <section className="container mx-auto px-4 py-10">
            <h2 className="text-2xl font-semibold mb-4">Tedavi Yöntemlerimiz</h2>
            <ul className="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                {items.map(t => (
                    <li key={t.slug} className="border rounded-lg overflow-hidden hover:shadow-sm transition">
                        {t.image ? (
                            <Image src={t.image} alt={t.name} width={600} height={360} className="w-full h-40 object-cover"/>
                        ) : null}
                        <a href={`/${t.slug}`} className="block p-4">{t.name}</a>
                    </li>
                ))}
            </ul>
        </section>
    );
}
