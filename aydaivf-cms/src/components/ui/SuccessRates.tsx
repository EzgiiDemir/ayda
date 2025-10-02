// src/components/ui/SuccessRates.tsx
import { SuccessRatesResponse } from "@/lib/cms";

export default function SuccessRates({ data }: { data: SuccessRatesResponse }) {
    const hero = data.heroImage ?? "https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg";

    return (
        <main className="flex-1 flex flex-col">
            <div>
                <div
                    className="bg-gray-300 w-full aspect-[16/7] md:aspect-[16/5] max-h-[400px]"
                    style={{ backgroundImage:`url("${hero}")`, backgroundRepeat:"no-repeat", backgroundPosition:"center center", backgroundSize:"cover" }}
                />
                <div className="container flex flex-col gap-5 py-5 md:py-10">
                    <p className="text-ayda-blue text-lg md:text-xl text-center uppercase font-medium">
                        {data.title}
                    </p>

                    {/* Intro */}
                    {data.intro ? (
                        <div className="flex flex-col gap-3">
                            <div className="flex flex-col lg:flex-row gap-6 items-center">
                                <div className="flex-1 flex flex-col gap-2">
                                    <div className="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
                                        <div dangerouslySetInnerHTML={{ __html: data.intro }} />
                                    </div>
                                </div>
                            </div>
                        </div>
                    ) : null}

                    {/* Groups */}
                    {data.groups.map(group => (
                        <div key={group.key} className="flex flex-col gap-3">
                            {group.heading ? (
                                <p className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
                                    {group.heading}
                                </p>
                            ) : null}

                            <div className="overflow-x-auto mt-3">
                                <figure className="table" style={{minWidth:"100%"}}>
                                    <table className="min-w-full border border-gray-300 text-xs md:text-sm">
                                        <thead>
                                        <tr className="bg-gray-100">
                                            <th className="text-left p-3 border-b border-gray-300 font-semibold">
                                                Tedavi / Grup
                                            </th>
                                            <th className="text-left p-3 border-b border-gray-300 font-semibold">
                                                Başarı Oranı
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {group.items.map(item => (
                                            <tr key={item.slug} className="hover:bg-gray-50 transition-colors">
                                                <td className="p-3 border-b border-gray-300" dangerouslySetInnerHTML={{ __html: item.name }} />
                                                <td className="p-3 border-b border-gray-300">
                                                    {item.rate !== null ? `${item.rate}${item.unit ?? '%'}` : '-'}
                                                </td>
                                            </tr>
                                        ))}
                                        </tbody>
                                    </table>
                                </figure>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </main>
    );
}
