import { notFound } from "next/navigation";
import { getPage, getAllSlugs, type Locale } from "@/lib/cms";

export const dynamic = "force-dynamic";
export const revalidate = 60;

export default async function Page({ params }: { params: { locale: Locale; slug: string[] } }) {
    const { locale, slug } = params;
    const path = (slug ?? []).join("/");
    const page = await getPage(locale, path);
    if (!page) return notFound();

    return (
        <div className="container mx-auto px-4 py-10">
            <h1 className="text-3xl font-bold mb-6">{page.title}</h1>
            {page.html && <div className="prose max-w-none" dangerouslySetInnerHTML={{ __html: page.html }} />}
        </div>
    );
}

// (opsiyonel) build-time pre-render
export async function generateStaticParams() {
    const slugs = await getAllSlugs();
    const locales: Locale[] = ["tr","en"];
    return slugs.flatMap(s => locales.map(locale => ({ locale, slug: s.split("/") })));
}
