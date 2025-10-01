import { notFound } from "next/navigation";
import { getPage } from "@/lib/cms";

export default async function Page({
                                       params,
                                   }: { params: Promise<{ locale: "tr"|"en"; slug: string[] }> }) {
    const { locale, slug } = await params;
    const path = slug.join("/");
    const page = await getPage(locale, path);
    if (!page) return notFound();

    return (
        <div className="container mx-auto px-4 py-10">
            <h1 className="text-3xl font-bold mb-6">{page.title}</h1>
            {page.html ? (
                <div className="prose max-w-none" dangerouslySetInnerHTML={{ __html: page.html }} />
            ) : null}
            {page.sections?.map(s=>(
                <section key={s.id} className="mt-8">
                    <h2 className="text-2xl font-semibold mb-2">{s.heading}</h2>
                    <p>{s.text}</p>
                </section>
            ))}
        </div>
    );
}
