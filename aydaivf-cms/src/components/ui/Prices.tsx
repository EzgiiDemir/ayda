import React from "react";
import { abs, type OurPricesDTO } from "@/lib/cms";

export default function Prices({ data }: { data: OurPricesDTO }) {
    const hero =
        data.sections?.headerImage ? abs(data.sections.headerImage) : "";

    return (
        <main className="flex-1 flex flex-col">
            <div>
                <div
                    className="bg-gray-300 w-full aspect-[16/7] md:aspect-[16/5] max-h-[400px]"
                    style={{
                        backgroundImage: hero ? `url("https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg"})` : undefined,
                        backgroundRepeat: "no-repeat",
                        backgroundPosition: "center center",
                        backgroundSize: "cover",
                    }}
                />
                <div className="container flex flex-col gap-5 py-5 md:py-10">
                    <p className="text-ayda-blue text-lg md:text-xl text-center uppercase font-medium">
                        {data.sections?.contextTitle ?? "Fiyatlarımız"}
                    </p>

                    <div
                        className="flex flex-col gap-7 md:gap-10 "
                        dangerouslySetInnerHTML={{ __html: data.html }}
                    />
                </div>
            </div>
        </main>
    );
}
