import { getAllSlugs, getPage } from "@/lib/cms";
import { notFound } from "next/navigation";

export async function generateStaticParams() {
    const [tr, en] = await Promise.all([getAllSlugs("tr"), getAllSlugs("en")]);
    return [
        ...tr.map(s => ({ locale: "tr" as const, slug: s.split("/") })),
        ...en.map(s => ({ locale: "en" as const, slug: s.split("/") })),
    ];
}

export default async function Page({
                                       params,
                                   }: { params: Promise<{ locale: "tr" | "en"; slug: string[] }> }) {
    const { locale, slug } = await params;
    const path = (slug ?? []).join("/");
    const data = await getPage(locale, path);
    if (!data) return notFound();

    return (
        <div className="container py-10">
            <h1 className="text-3xl font-semibold mb-6">{data.title}</h1>
            {data.html && (
                <article className="prose max-w-none" dangerouslySetInnerHTML={{ __html: data.html }} />
            )}
            {!data.html && data.sections?.length ? (
                <div className="space-y-8">
                    {data.sections.map(s => (
                        <section key={s.id}>
                            <h2 className="text-2xl font-semibold mb-2">{s.heading}</h2>
                            <p>{s.text}</p>
                        </section>
                    ))}
                </div>
            ) : null}
        </div>
    );
}
