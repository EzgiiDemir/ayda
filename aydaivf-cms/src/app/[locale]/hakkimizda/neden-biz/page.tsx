import React from "react";
import { getWhyUs, abs, type Locale } from "@/lib/cms";

export default async function WhyUsPage({
                                            params,
                                        }: {
    params: Promise<{ locale: Locale }>;
}) {
    const { locale } = await params;

    const data = await getWhyUs(locale);
    const hero = data.sections?.headerImage ? abs(data.sections.headerImage) : "";
    const contextTitle = data.sections?.contextTitle ?? "";

    return (
        <main>
            {hero && (
                <div
                    className="w-full aspect-[16/6] bg-center bg-cover"
                    style={{ backgroundImage: `url(${hero})` }}
                />
            )}

            <div className="container mx-auto px-4 py-8">
                {contextTitle && (
                    <h1 className="text-ayda-blue text-lg md:text-xl text-center uppercase font-medium">
                        {contextTitle}
                    </h1>
                )}

                <article
                    className="prose max-w-none"
                    dangerouslySetInnerHTML={{ __html: data.html }}
                />
            </div>
        </main>
    );
}
